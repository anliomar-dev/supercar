<?php

namespace controllers;

use app\MainController;
use models\Utilisateur;
use PDOException;

class SignupController extends MainController
{
    private Utilisateur $userModele;

    public function __construct(){
        $this->userModele = $this->loadModel("Utilisateur");
    }

    public function index(): void{
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            extract($_POST);
            // Data coming from the POST request
            $data = [$firstname, $lastname, $address, $phone, $email, $password, $confirm_password];

            $all_fields_not_empty = array_reduce($data, function($result, $item){
                return $result && !empty(trim($item));
            }, true);

            if(!$all_fields_not_empty){
                $warning_message = "tous les champs doivent être correctement remplis";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "signup");
                exit();
            }

            if($password != $confirm_password){
                $error_message = "les 2 mots de passes ne correspondent pas.";
                self::setFlashMessageAndRender($error_message, "alert-error", "signup");
                exit();
            }

            if($this->userModele->isRowExists("utilisateur", "email", $email)){
                $warning_message = "Un compte utilisateur avec cette adresse mail existe déjà.";
                self::setFlashMessageAndRender($warning_message, "alert-warning", "signup");
                exit();
            }
            try{
                // Data coming from the POST request
                $new_user = $this->userModele::create([
                    "prenom" => $firstname,
                    "nom" => $lastname,
                    "adresse" => $address,
                    "telephone" => $phone,
                    "email" => $email,
                    "mot_de_passe" => password_hash($password, PASSWORD_BCRYPT)
                ]);
                if(is_array($new_user)){
                    $success_message = "Votre compte a été créé, vous pouvez désormais vous connecter";
                    $this->setFlashMessage($success_message, "alert-success");
                }else{
                    $error_message = "Un problème est survenur lors de la création de votre compte ! veuillez réassayer plus tard";
                    $this->setFlashMessage($error_message, "alert-error");
                }
            }catch (PDOException $exception) {
                error_log('Database error: ' . $exception->getMessage());
                $error_message = "Un problème est survenur lors de la création de votre compte ! veuillez réassayer plus tard";
                $this->setFlashMessage($error_message, "alert-error");
            }
            $this->render("signup");
        }
        $this->render("signup");
    }
}
