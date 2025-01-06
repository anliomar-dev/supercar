<?php

namespace controllers;

use app\MainController;
use models\Contact;

class ContactController extends MainController
{
    private Contact $contactModel;

    public function __construct(){
        $this->contactModel = $this->loadModel("Contact");
    }

    /**
     * render the contact form when the http method is GET
     * and treat the form while posting data then render the contact form with a message
     * @return void
     */
    public function index(): void{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->render("contact");
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
            extract($_POST);
            $firstname = htmlspecialchars($firstname);
            $lastname = htmlspecialchars($lastname);
            $phone = htmlspecialchars($phone);
            $email = htmlspecialchars($email);
            $subject = htmlspecialchars($subject);
            $message = htmlspecialchars($message);
            $data = [$firstname,$lastname,$phone,$email,$subject,$message];

            $all_fields_not_empty =array_reduce($data, function($result, $item){
                return $result && !empty(trim($item));
            }, true);

            if($all_fields_not_empty){
                $success_message = "Votre message a été envoyé ! Nous vous contacterons bientôt";
                $this->setFlashMessage($success_message, "alert-success");
                $this->render("contact");
            }else{
                echo "tous les champs doivent être correctement remplis";
            }
        }
    }
}