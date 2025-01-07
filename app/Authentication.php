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
        $_SESSION["is_admin"] = $user_data["peut_acceder_backoffice"];
        $_SESSION["is_super_user"] = $user_data["est_super_utilisateur"];

        $csrfProtection = new CsrfProtection();
        $_SESSION['csrf_token'] = $csrfProtection->generateToken();
    }

    public function logout(): void
    {
        session_unset();
        session_destroy();
        // redirect user to the signin page
        header("Location: /supercar/login");
        exit();
    }

    public function is_authenticated(){

    }

}
