<?php

    namespace admin;

    use app\Authentication;
    use app\MainController;
    use app\Paginator;
    use http\Header;
    use models\Utilisateur;
    use PDOException;

    class Utilisateurs extends MainController
    {
        private Utilisateur $utilisateurModele;
        private Authentication $auth;
        /**
         * Constructor for initializing model "Voiture".
         */
        public function __construct()
        {
            // Ensure loadModel returns an instance of models\Utilisateur
            $this->utilisateurModele = $this->loadModel("Utilisateur");
            $this->auth = new Authentication();
        }
        public function index(): void {
            // check is user is authenticated
            $this->auth->is_authenticated("admin", 300);
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
            // check is user is authenticated
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("utilisateurs", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $first_name = $_POST["firstname"] ?? "";
                $last_name = $_POST["lastname"] ?? "";
                $address = $_POST["address"] ?? "";
                $phone = $_POST["phone"] ?? "";
                $email = $_POST["email"] ?? "";
                $est_admin = intval($_POST["est-admin"]) ?? 0;
                $est_superadmin = intval($_POST["est-superadmin"]) ?? 0;
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
                        "est_admin" => $est_admin,
                        "est_superadmin" => $est_superadmin,
                        "mot_de_passe" => password_hash($password, PASSWORD_BCRYPT)
                    ]);
                    if(is_array($new_user)){
                        $success_message = "Le compte compte a été créé avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/utilisateurs?user=".$new_user["id_utilisateur"]);
                    }else{
                        $error_message = "Un problème est survenu lors de la création de votre compte ! Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/utilisateurs/create");
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de la création de votre compte ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/utilisateurs/create");
                }
            }
            else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "utilisateurs", "admin");
                exit();
            }
        }

        public function update(): void{
            // check is user is authenticated
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("utilisateurs", "admin",);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_utilisateur = $_POST["id_utilisateur"] ?? "";
                $first_name = $_POST["firstname"] ?? "";
                $last_name = $_POST["lastname"] ?? "";
                $address = $_POST["address"] ?? "";
                $phone = $_POST["phone"] ?? "";
                $email = $_POST["email"] ?? "";
                $est_admin = intval($_POST["est-admin"]) ?? 0;
                $est_superadmin = intval($_POST["est-superadmin"]) ?? 0;
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
                    header("Location: /supercar/admin/utilisateurs?user=".$id_utilisateur);
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
                            "est_admin" => $est_admin,
                            "est_superadmin" => $est_superadmin,
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
                            "est_admin" => $est_admin,
                            "est_superadmin" => $est_superadmin,
                        ]);
                    }
                    if(is_array($new_user)){
                        $success_message = "information de l'utlisateur modifiées avec succès";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/utilisateurs?user=$id_utilisateur");
                    }else{
                        $error_message = "Un problème est survenu lors de la modification ! Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/utilisateurs?user=".$id_utilisateur);
                    }
                }catch (PDOException $exception) {
                    error_log('Database error: ' . $exception->getMessage());
                    $error_message = "Un problème est survenu lors de la modification ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: /supercar/admin/utilisateurs?user=".$id_utilisateur);
                }
            }
            else{
                $warning_message = "Methode non autorisée";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "utilisateurs", "admin");
                exit();
            }
        }

        public function delete(): void{
            // check is user is authenticated
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $id_utilisateur = $_GET["user"] ?? "";
                if(empty($id_utilisateur)){
                    $warning_message = "Veuillez preciser l'id de l'utilisateur a supprimer";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/utilisateurs");
                }
                $this->render("delete", "admin", [
                    "confirmation_msg" => "Voulez-vous supprimer ce compte ?",
                    "id" => $id_utilisateur
                ]);
            }else if($_SERVER["REQUEST_METHOD"] == "POST"){
                $id_utilisateur = $_POST["id"] ?? "";
                try{
                    $deleted = $this->utilisateurModele->delete($id_utilisateur);
                    if($deleted){
                        $success_message = "Le compte a été supprimé avec succès !";
                        $this->setFlashMessage($success_message, "alert-success");
                        header("Location: /supercar/admin/utilisateurs");
                    }else{
                        $error_message = "Le compte n'a pas été supprimé, Veuillez réessayer plus tard.";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: /supercar/admin/utilisateurs");
                    }
                }catch (PDOException $exception) {
                    $warning_message = "Une erreur est survenue lors de la  de l'utilisateur ! Veuillez réessayer plus tard.";
                    $this->setFlashMessage($warning_message, "alert-warning");
                    header("Location: /supercar/admin/utilisateurs");
                }
            }
        }


        public function moi(): void{
            // check is user is authenticated and redirect login is he/she is not
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("mon_profile", "admin");
            }
        }

        public function supprimer_mon_compte(): void{
            // check is user is authenticated
            $this->auth->is_authenticated("admin", 300);
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $my_id = $_GET["id"] ?? "";
            }
        }
    }