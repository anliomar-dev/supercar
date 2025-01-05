<?php

    namespace controllers;

    use app\MainController;
    use models\Utilisateur;

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
                    $this->render("contact", "",  ["message" => $warning_message, "type" => "alert-warning"]);
                    exit();
                }

                if($password != $confirm_password){
                    $warning_message = "les 2 mots de passes ne correspondent pas";
                    $this->render("signup", "",  ["message" => $warning_message, "type" => "alert-error"]);
                    exit();
                }

                if($this->userModele->isRowExists("utilisateur", "email", $email)){
                    $warning_message = "Un compte utilisateur avec cette adresse mail existe déjà";
                    $this->render("signup", "",  ["message" => $warning_message, "type" => "alert-warning"]);
                    exit();
                }
                var_dump($data);
                $this->render("signup");
            }
        }
    }
