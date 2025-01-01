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


    public function index(): void{
        if($_SERVER["REQUEST_METHOD"] == "GET"){
            $this->render("contact");
        }elseif ($_SERVER["REQUEST_METHOD"] == "POST"){
            extract($_POST);
            var_dump($email);
        }
    }
}