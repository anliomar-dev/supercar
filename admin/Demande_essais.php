<?php

    namespace admin;

    use app\MainController;
    use app\Paginator;
    use DateTime;
    use Exception;
    use models\Essai;
    use models\Marque;
    use models\Utilisateur;
    use PDOException;

    class Demande_essais extends MainController
    {
        private Essai $demandeEssaiModel;
        private Marque $marqueModel;
        private Utilisateur $utilisateurModel;


        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Utilisateur
            $this->demandeEssaiModel = $this->loadModel("Essai");
            $this->marqueModel = new Marque;
            $this->utilisateurModel = new Utilisateur();
        }
        public function index(): void {
            // the id of the test drive (demande d'essai)
            $test_id = $_GET["essai"] ?? 0;
            if($test_id == 0){
                $query = "SELECT essai.id_essai, essai.date_essai, 
                        essai.heure, essai.status, modele.nom AS voiture
                        FROM essai
                        JOIN modele ON modele.id_modele = essai.id_modele
                     ";
            }else{
                $query = "SELECT essai.*, 
                            modele.nom AS nom_modele, 
                            utilisateur.id_utilisateur AS applicant_id, utilisateur.prenom AS applicant_firstname, 
                            utilisateur.nom AS applicant_lastname
                            FROM essai 
                            JOIN modele ON modele.id_modele = essai.id_modele
                            JOIN utilisateur ON utilisateur.id_utilisateur = essai.id_utilisateur
                            WHERE id_essai = $test_id";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            // create an instance of the class paginator
            $paginator = new Paginator($this->demandeEssaiModel->getConnection(), $query, $per_page, $current_page);
            // paginate data
            $paginated_tests = $paginator->getPaginationData();
            $base_url = "/supercar/admin/demande_essais";

            $total_pages = $paginated_tests["total_page"];
            $next_url = null;
            $prev_url = null;

            if($total_pages > 1 && $current_page < $total_pages){
                $next_page = $current_page + 1;
                $next_url = $base_url . "?page=$next_page";
            }

            if($total_pages > 1 && $current_page > 1){
                $prev_page = $current_page - 1;
                $prev_url = $base_url . "?page=$prev_page";
            }

            $all_brands = $this->marqueModel->getAllBrands();

            // If the parameter test_id is 0, it means it was not set in the URL, so we return all test drive requests (demandes d'essai).
            // Otherwise, we return the details of the test drive corresponding to the ID passed in the URL.
            if ($test_id == 0){
                $this->render(
                    "demande_essais", "admin",
                    [
                        "paginated_tests" => $paginated_tests,
                        "all_brands" => $all_brands,
                        "all_users" => $this->utilisateurModel->getAll("utilisateur"),
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "demande_essais", "admin",
                    [
                        "all_brands" => $all_brands,
                        "current_test" => $paginated_tests["data"][0],
                    ]
                );
            }
        }

        /**
         * @throws Exception
         */
        public function create(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $all_users = $this->utilisateurModel->getAll("utilisateur");
                $all_brands = $this->marqueModel->getAllBrands();
                $this->render("demande_essais", "admin", [
                    "all_users" => $all_users,
                    "all_brands" => $all_brands
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                extract($_POST);
                $data = [$date, $time, $brand, $car, $user];
                $today = date("Y-m-d");
                // convert test drive date and todoy date in a date obj
                $dateObj = new DateTime($date);
                $todayObj = new DateTime($today);
                $interval = $todayObj->diff($dateObj); // calculate difference in days

                //convert given time from string to time obj eg: '21:30' => 21:30
                $timeObj = DateTime::createFromFormat('H:i', $time);
                $minutes = $timeObj->format('i');
                $startTime = DateTime::createFromFormat('H:i', '08:30');
                $endTime = DateTime::createFromFormat('H:i', '16:00');

                if($interval->days < 7){
                    $warning_message = "La date de l'essai doit être au minium 7 jours après la demande.";
                    self::setFlashMessage($warning_message, "alert-warning");
                    header('Location: /supercar/admin/demande_essais/create');
                    exit();
                }
                if ($timeObj < $startTime || $timeObj > $endTime) {
                    $warning_message = "Veuillez choisir un horaire entre 08:30 et 16:00, avec un interval de 30 minutes.";
                    self::setFlashMessage($warning_message, "alert-warning");
                    header('Location: /supercar/admin/demande_essais/create');
                    exit();
                }elseif($minutes != 00 && $minutes != 30){
                    $warning_message = "Veuillez choisir un horaire entre 08:30 et 16:00, avec un interval de 30 minutes.";
                    self::setFlashMessage($warning_message, "alert-warning");
                    header('Location: /supercar/admin/demande_essais/create');
                    exit();
                }
                try{
                    // Data coming from the POST request
                    $new_test_drive = $this->demandeEssaiModel::create([
                        "date_essai" => $date,
                        "heure" => $time,
                        "id_marque" => $brand,
                        "id_modele" => $car,
                        "id_utilisateur" => $user
                    ]);
                    if(is_array($new_test_drive)){
                        $success_message = "La demande a été enregistré.";
                        $this->setFlashMessage($success_message, "alert-success");
                        $id = $new_test_drive["id_essai"];
                        header("Location: /supercar/admin/demande_essais?essai=$id");
                    }else{
                        $error_message = "Un problème est survenur lors de l'enregistrement de la demande ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenur lors de l'enregistrement de la demande ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/demande_essais/create");
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "demande_essais", "admin");
                exit();
            }
        }

        /**
         * @throws Exception
         */
        public function update(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $all_users = $this->utilisateurModel->getAll("utilisateur");
                $all_brands = $this->marqueModel->getAllBrands();
                $this->render("demande_essais", "admin", [
                    "all_users" => $all_users,
                    "all_brands" => $all_brands
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                //data coming from edit form(date, time, brand, car, user, id_essai, old_date, status)
                extract($_POST);

                //$data = ["date" => $date, "time" => $time, "brand" => $brand, "car" => $car, "old_date" => $old_date, "id_essai" => $id_essai];
                //$today = date("Y-m-d");
                // convert test drive date and todoy date in a date obj
                $dateObj = new DateTime($date);
                //$todayObj = new DateTime($today);
                $old_date = new DateTime($old_date);
                $interval = $old_date->diff($dateObj); // calculate difference betwenn new date and old one

                //convert given time from string to time obj eg: '21:30' => 21:30
                $time = substr($time, 0, 5); // "09:30"
                $timeObj = DateTime::createFromFormat('H:i', $time);
                $minutes = $timeObj->format('i');
                $startTime = DateTime::createFromFormat('H:i', '08:30');
                $endTime = DateTime::createFromFormat('H:i', '16:00');
                if($interval->days < 0){
                    $warning_message = "la nouvelle date ne doit être avant la date actuelle";
                    self::setFlashMessage($warning_message, "alert-warning");
                    header('Location: /supercar/admin/demande_essais/create');
                    exit();
                }
                // il faut que l'heure soit compris entre 8h30 et 16h
                if ($timeObj < $startTime || $timeObj > $endTime) {
                    $warning_message = "Veuillez choisir un horaire entre 08:30 et 16:00, avec un interval de 30 minutes.";
                    self::setFlashMessage($warning_message, "alert-warning");
                    header('Location: /supercar/admin/demande_essais/create');
                    exit();
                    // les minuites: soit 00 ou 30
                }elseif($minutes != 00 && $minutes != 30){
                    $warning_message = "Veuillez choisir un horaire entre 08:30 et 16:00, avec un interval de 30 minutes.";
                    self::setFlashMessage($warning_message, "alert-warning");
                    header('Location: /supercar/admin/demande_essais/create');
                    exit();
                }
                try{
                    // Data coming from the POST request
                    $new_test_drive = $this->demandeEssaiModel::create([
                        "id_essai" => $id_essai,
                        "date_essai" => $date,
                        "heure" => $time,
                        "status" => $status,
                        "id_marque" => $brand,
                        "id_modele" => $car,
                    ]);
                    if(is_array($new_test_drive)){
                        $success_message = "La demande a été modifié.";
                        $this->setFlashMessage($success_message, "alert-success");
                        $id = $new_test_drive["id_essai"];
                        header("Location: /supercar/admin/demande_essais?essai=$id");
                    }else{
                        $error_message = "Un problème est survenur lors de la modification de la demande ! veuillez réassayer plus tard";
                        header("Location: /supercar/admin/demande_essais?essai=$id_essai");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenur lors de la modification de la demande ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/demande_essais?essai=$id_essai");
                }
            } else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "demande_essais", "admin");
                exit();
            }
        }
    }

