<?php

    namespace admin;

    use app\MainController;
    use app\Paginator;
    use http\Header;
    use models\Utilisateur;
    use PDOException;

    class Utilisateurs extends MainController
    {
        private Utilisateur $utilisateurModele;
        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Utilisateur
            $this->utilisateurModele = $this->loadModel("Utilisateur");
        }
        public function index(): void {
            $user_id = $_GET["user"] ?? 0;
            if($user_id == 0){
                $query = "SELECT * FROM utilisateur";
            }else{
                $query = "SELECT * FROM utilisateur WHERE id_utilisateur = $user_id";
            }
            $current_page = $_GET['page'] ?? 1;
            $per_page = 6;
            $paginator = new Paginator($this->utilisateurModele->getConnection(), $query, $per_page, $current_page);
            $paginated_users = $paginator->getPaginationData();
            $base_url = "/supercar/admin/utilisateurs";

            $total_pages = $paginated_users["total_page"];
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

            if ($user_id == 0){
                $this->render(
                    "utilisateurs", "admin",
                    [
                        "paginated_users" => $paginated_users,
                        "prev_url" => $prev_url,
                        "next_url" => $next_url
                    ]
                );
            }else{
                $this->render(
                    "utilisateurs", "admin",
                    [
                        "current_user" => $paginated_users["data"][0] ?? [],
                    ]
                );
            }
        }

        public function create(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("utilisateurs", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $first_name = $_POST["firstname"] ?? "";
                $last_name = $_POST["lastname"] ?? "";
                $address = $_POST["address"] ?? "";
                $phone = $_POST["phone"] ?? "";
                $email = $_POST["email"] ?? "";
                $password = $_POST["password"] ?? "";
                $confirm_password = $_POST["confirm_password"] ?? "";

                if($password != $confirm_password){
                    $error_message = "les 2 mots de passes ne correspondent pas.";
                    self::setFlashMessageAndRender($error_message, "alert-error", "utilisateurs", "admin");
                    exit();
                }

                if($this->utilisateurModele->isRowExists("utilisateur", "email", $email)){
                    $warning_message = "Un compte utilisateur avec cette adresse mail existe déjà.";
                    self::setFlashMessageAndRender($warning_message, "alert-warning", "utilisateurs", "admin");
                    exit();
                }

                try{
                    // Data coming from the POST request
                    $new_user = $this->utilisateurModele::create([
                        "prenom" => $first_name,
                        "nom" => $last_name,
                        "adresse" => $address,
                        "telephone" => $phone,
                        "email" => $email,
                        "mot_de_passe" => password_hash($password, PASSWORD_BCRYPT)
                    ]);
                    if(is_array($new_user)){
                        $success_message = "Le compte compte a été créé avec succès". $new_user["id_utilisateur"];
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/utilisateurs?user=".$new_user["id_utilisateur"]);
                    }else{
                        $error_message = "Un problème est survenur lors de la création de votre compte ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/utilisateurs/create");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenur lors de la création de votre compte ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                }
            }
            else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "utilisateurs", "admin");
                exit();
            }
        }

        public function update(): void{
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("utilisateurs", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_utilisateur = $_POST["id_utilisateur"] ?? "";
                $first_name = $_POST["firstname"] ?? "";
                $last_name = $_POST["lastname"] ?? "";
                $address = $_POST["address"] ?? "";
                $phone = $_POST["phone"] ?? "";
                $email = $_POST["email"] ?? "";
                $password = $_POST["password"] ?? "";
                $confirm_password = $_POST["confirm_password"] ?? "";

                if(empty($id_utilisateur)){
                    $error_message = "invalid id_utilisateur";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/utilisateurs");
                    exit();
                }

                if((!empty($password) || !empty($confirm_password)) && $password != $confirm_password){
                    $error_message = "Si vous modifier le mot de passe, les 2 champ doivent être correctement remplis et doivent être égaux.";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/utilisateurs?user_id=".$id_utilisateur);
                    exit();
                }

                try{
                    // Data coming from the POST request
                    if(!empty($password) && !empty($confirm_password)){
                        $new_user = $this->utilisateurModele::create([
                            "id_utilisateur" => $id_utilisateur,
                            "prenom" => $first_name,
                            "nom" => $last_name,
                            "adresse" => $address,
                            "telephone" => $phone,
                            "email" => $email,
                            "mot_de_passe" => password_hash($password, PASSWORD_BCRYPT)
                        ]);
                    }else{
                        $new_user = $this->utilisateurModele::create([
                            "id_utilisateur" => $id_utilisateur,
                            "prenom" => $first_name,
                            "nom" => $last_name,
                            "adresse" => $address,
                            "telephone" => $phone,
                            "email" => $email,
                        ]);
                    }
                    if(is_array($new_user)){
                        $success_message = "information de l'utlisateur modifiées avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/utilisateurs?user_id=$id_utilisateur");
                    }else{
                        $error_message = "Un problème est survenur lors de la modification ! veuillez réassayer plus tard";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/utilisateurs?user_id=".$id_utilisateur);
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenur lors de la modification ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/utilisateurs?user_id=".$id_utilisateur);
                }
            }
            else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "utilisateurs", "admin");
                exit();
            }
        }

        public function delete(): void{

        }
    }