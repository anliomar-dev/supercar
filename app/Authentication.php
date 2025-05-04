<?php

    namespace app;

    use app\MainController;
    use JetBrains\PhpStorm\NoReturn;
    use models\Utilisateur;
    use app\CsrfProtection;
    use Random\RandomException;

    class Authentication extends MainController
    {
        private Utilisateur $userModel;

        public function __construct(){
            $this->userModel = $this->loadModel("Utilisateur");
        }

        public function authenticate(string $email, string $password): ?array{
            return $this->userModel->authenticate_user($email, $password);
        }

        /**
         * @throws RandomException
         */
        public function login(array $user_data): void
        {
            $_SESSION["user_id"] = $user_data["id_utilisateur"];
            $_SESSION["username"] = $user_data["prenom"]." ".$user_data["nom"];
            $_SESSION["is_admin"] = $user_data["est_admin"];
            $_SESSION["is_super_user"] = $user_data["est_superadmin"];

            $csrfProtection = new CsrfProtection();
            $_SESSION['csrf_token'] = $csrfProtection->generateToken();
        }

        public function logout(): void
        {
            $this->destroySession();
            header("Location: /supercar/login");
        }

        public function destroySession(): void{
            session_unset();
            session_destroy();
        }

        public function session_expired():void{
            $this->render("session_expired");

        }

        public function is_authenticated(): void
        {
            if (empty($_SESSION["user_id"]) || empty($_SESSION["csrf_token"])) {
                $next = $_SERVER['REQUEST_URI'];
                $next = str_replace('/supercar/', '', $next);
                header("Location: /supercar/login?next=" . $next);
                exit();
            }
            $session_timeout = 60;
            if (isset($_SESSION["last_activity"]) && (time() - $_SESSION["last_activity"]) > $session_timeout) {
                $this->destroySession();
                // redirect user to the signin page
                header("Location: /supercar/authentication/session_expired");
                exit();

            }
            $_SESSION["last_activity"] = time();
        }


    }
