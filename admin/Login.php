<?php

    namespace admin;

    use app\Authentication;
    use app\MainController;
    use Random\RandomException;

    class Login extends MainController
    {
        /**
         * @throws RandomException
         */
        public function index(): void{
            $request_uri = $_SERVER['REQUEST_URI'];
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                $this->render("login", "admin");
            }elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
                $email = $_POST["email"] ?? "";
                $password = $_POST["password"] ?? "";
                $next = $_POST['next'] ?? "admin/dashboard";

                if(empty($email) || empty($password)){
                    $error_message = "Les deux champs doivent être correctement remplis!";
                    $this->setFlashMessage($error_message, "alert-error");
                    header("Location: $request_uri");
                }

                $auth = new Authentication();
                $user = $auth->authenticate($email, $password);
                if($user && is_array($user)){
                    if($user["est_admin"] == 1){
                        $auth->login($user);
                        header("Location: /supercar/{$next}");
                    }else{
                        $error_message = "Accès refusé : Vous n'avez pas les droits d'accès à l'administration";
                        $this->setFlashMessage($error_message, "alert-error");
                        header("Location: $request_uri");
                    }
                    exit();
                }
                $error_message = "Email et/ou mot de passe incorrect";
                $this->setFlashMessage($error_message, "alert-error");
                header("Location: $request_uri");
            }
        }
    }