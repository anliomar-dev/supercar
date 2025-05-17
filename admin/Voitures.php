<?php

    namespace admin;

    use AllowDynamicProperties;
    use app\MainController;
    use app\Paginator;
    use models\Marque;
    use models\Voiture;
    use PDOException;

    // Import the 'models\Voiture' class

    #[AllowDynamicProperties] class Voitures extends MainController
    {
        private Voiture $voitureModele;
        private Marque $marqueModel;

        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Voiture
            $this->voitureModele = $this->loadModel("voiture");
            $this->marqueModel = new Marque();

        }
        public function index(): void {
            $slug = $_GET["slug"] ?? "";
            if($slug == ""){
                $query = "
                    SELECT marque.nom AS nom_marque, marque.logo AS marque_logo, 
                           modele.id_modele AS id_modele, modele.nom AS modele, 
                           modele.prix AS prix, modele.slug AS modele_slug
                    FROM modele
                    JOIN marque ON marque.id_marque = modele.id_marque
                ";
            }else{
                $query = "SELECT * FROM modele WHERE slug = '$slug'";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->voitureModele->getConnection(), $query, $per_page, $current_page);
            $paginated_cars = $paginator->getPaginationData();
            $base_url = "/supercar/admin/voitures";

            $total_pages = $paginated_cars["total_page"];
            $next_url = null;
            $prev_url = null;

            if($total_pages > 1 && $current_page < $total_pages){
                $next_page = $current_page + 1;
                $next_url = empty($marque) ? $base_url . "?page=$next_page" :
                    $base_url . "&page=$next_page";
            }

            if($total_pages > 1 && $current_page > 1){
                $prev_page = $current_page - 1;
                $prev_url = empty($marque) ? $base_url . "?page=$prev_page" :
                    $base_url . "&page=$prev_page";
            }

            $all_brands = $this->marqueModel->getAllBrands();

            if ($slug == ""){
                $this->render(
                    "voitures", "admin",
                    [
                        "all_brands" => $all_brands,
                        "paginated_cars" => $paginated_cars,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "voitures", "admin",
                    [
                        "all_brands" => $all_brands,
                        "current_car" => $paginated_cars["data"][0] ?? [],
                    ]
                );
            }
        }

        public function create(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $all_brands = $this->marqueModel->getAllBrands();
                $this->render("voitures", "admin", ["all_brands" => $all_brands]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $car_name = $_POST["nom"] ?? "";
                $id_marque = $_POST["id_marque"] ?? "";
                $moteur = $_POST["moteur"] ?? "";
                $prix = $_POST["prix"] ?? "";
                $transmission = $_POST["transmission"] ?? "";
                $carburant = $_POST["carburant"] ?? "";
                $annee = $_POST["annee"] ?? "";
                $description = $_POST["description"] ?? "";

                $data = [$car_name, $id_marque, $moteur, $prix, $transmission, $carburant, $annee, $description];

                $all_fields_fielled = array_reduce($data, function($result, $item){
                    return $result && !empty(trim($item));
                }, true);

                if(!$all_fields_fielled){
                    $warning_message = "tous les champs doivent être correctement remplis";

                    self::setFlashMessageAndRender(
                        $warning_message,
                        "alert-warning",
                        "voitures",
                        "admin"
                    );
                    exit();
                }

                if($this->voitureModele->isRowExists("modele", "nom", $car_name)){
                    $warning_message = "Une voiture avec ce nom exite dejà";
                    self::setFlashMessageAndRender(
                        $warning_message,
                        "alert-warning",
                        "voitures",
                        "admin"
                    );
                    exit();
                }

                try{
                    // Data coming from the POST request
                    $new_car = $this->voitureModele::create([
                        "nom" => $car_name,
                        "prix" => $prix,
                        "moteur" => $moteur,
                        "transmission" => $transmission,
                        "carburant" => $carburant,
                        "annee" => $annee,
                        "description" => trim($description),
                        "id_marque" => $id_marque
                    ]);
                    if(is_array($new_car)){
                        $success_message = "La Voiture a été ajouté avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/voitures?slug=".str_replace(" ", "-", $car_name));
                    }else{
                        $error_message = "Un problème est survenu lors de l'ajout de la nouvelle marque ! veuillez réassayer plus tard";
                        self::setFlashMessageAndRender(
                            $error_message,
                            "alert-error",
                            "voitures",
                            "admin"
                        );
                        exit();
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de l'ajout de la nouvelle voiture 2 ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/voitures/create");
                }
            } else{
                $warning_message = "Methode non autorisée";
                $this->setFlashMessage($warning_message, "alert-warning");
                header("Location: /supercar/admin/voitures/create");
            }
        }
        public function update(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $all_brands = $this->marqueModel->getAllBrands();
                $this->render("voitures", "admin", ["all_brands" => $all_brands]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_modele = $_POST["id_modele"] ?? "";
                $car_name = $_POST["nom"] ?? "";
                $id_marque = $_POST["id_marque"] ?? "";
                $moteur = $_POST["moteur"] ?? "";
                $prix = $_POST["prix"] ?? "";
                $transmission = $_POST["transmission"] ?? "";
                $carburant = $_POST["carburant"] ?? "";
                $annee = $_POST["annee"] ?? "";
                $description = $_POST["description"] ?? "";

                $data = [$car_name, $id_marque, $moteur, $prix, $transmission, $carburant, $annee, $description];

                $all_fields_fielled = array_reduce($data, function($result, $item){
                    return $result && !empty(trim($item));
                }, true);

                if(!$all_fields_fielled){
                    $warning_message = "tous les champs doivent être correctement remplis";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/voitures?slug=".str_replace(" ", "-", $car_name));
                }

                try{
                    // Data coming from the POST request
                    $new_car = $this->voitureModele::create([
                        "id_modele" => $id_modele,
                        "nom" => $car_name,
                        "prix" => $prix,
                        "moteur" => $moteur,
                        "transmission" => $transmission,
                        "carburant" => $carburant,
                        "annee" => $annee,
                        "description" => trim($description),
                        "id_marque" => $id_marque
                    ]);
                    if(is_array($new_car)){
                        $success_message = "Modifications efféctués avec succes";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/voitures?slug=".str_replace(" ", "-", $car_name));
                    }else{
                        $error_message = "Un problème est survenu ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/voitures?slug=".str_replace(" ", "-", $car_name));
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/voitures?slug=".str_replace(" ", "-", $car_name));
                }
            } else{
                $warning_message = "Methode non autorisée";
                $this->setFlashMessage($warning_message, "alert-warning");
                header("Location: /supercar/admin/voitures");
            }
        }
    }