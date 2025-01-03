<?php

namespace controllers;

use app\MainController;

class LoginController extends MainController
{
    public function index(): void{
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $this->render("login");
        }elseif ($_SERVER['REQUEST_METHOD'] == 'POST'){
            echo "posted data";
            $this->render("login");
        }
    }
}