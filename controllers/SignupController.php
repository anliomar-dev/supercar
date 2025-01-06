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
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->render("signup");
        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
            extract($_POST);
            $first_name = htmlspecialchars($firstname);
            $last_name = htmlspecialchars($lastname);
            $address = htmlspecialchars($address);
            $phone = htmlspecialchars($phone);
            $email = htmlspecialchars($email);
            $password = htmlspecialchars($password);
            $confirm_password = htmlspecialchars($confirm_password);

            $data = [$first_name, $last_name, $address, $phone, $email, $password, $confirm_password];

            $all_fields_not_empty = array_reduce($data, function($result, $item){
                return $result && !empty(trim($item));
            }, true);

            if(!$all_fields_not_empty){
                $warning_message = "tous les champs doivent être correctement remplis";
                $this->setFlashMessage($warning_message, "alert-warning");
                $this->render("contact");
                exit();
            }

            if($password != $confirm_password){
                $error_message = "les 2 mots de passes ne correspondent pas";
                $this->setFlashMessage($error_message, "alert-error");
                $this->render("signup");
                exit();
            }

            if($this->userModele->isRowExists("utilisateur", "email", $email)){
                $warning_message = "Un compte utilisateur avec cette adresse mail existe déjà";
                $this->setFlashMessage($warning_message, "alert-warning");
                $this->render("signup");
                exit();
            }
             try{
                 $user_created = $this->userModele::create([
                     "prenom" => $first_name,
                     "nom" => $last_name,
                     "adresse" => $address,
                     "telephone" => $phone,
                     "email" => $email,
                     "mot_de_passe" => password_hash($password, PASSWORD_BCRYPT)
                 ]);
                 if(is_array($user_created)){
                     $success_message = "Votre compte a été créé, vous pouvez désormais vous connecter";
                     $this->setFlashMessage($success_message, "alert-success");
                     $this->render("signup");
                 }
             }catch (PDOException $exception) {
                 // Log the error to a file rather than displaying it
                 error_log('Database error: ' . $exception->getMessage());
                 $error_message = $exception->getMessage();
                 $this->setFlashMessage($error_message, "alert-error");
                 $this->render("signup");
             }
        }
    }
}
