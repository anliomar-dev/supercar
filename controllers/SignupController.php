<?php

namespace controllers;

use app\MainController;

class SignupController extends MainController
{
    public function index(): void{
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->render("signup");
        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo "posted data";
            $this->render("signup");
        }
    }
}