<?php
namespace controllers;

use app\MainController;
use app\Authentication;
use Random\RandomException;

class LoginController extends MainController
{
    /**
     * @throws RandomException
     */
    public function index(): void{
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            if(!isset($_POST["email"]) || !isset($_POST["password"])){
                $error_message = "Les deux champs doivent être correctement remplis";
                self::setFlashMessageAndRender($error_message, "alert-error", "login");
                exit();
            }
            $email = $_POST["email"];
            $password = $_POST["password"];
            $next = $_POST['next'] ?? "dashboard/profile";

            $auth = new Authentication();
            $user = $auth->authenticate($email, $password);
            if($user && is_array($user)){
                $auth->login($user);
                header("Location: /supercar/{$next}");
                exit();
            }
            $error_message = "Email et/ou mot de passe incorrect";
            self::setFlashMessageAndRender($error_message, "alert-error", "login");
            exit();
        }
        $this->render("login");
    }

}