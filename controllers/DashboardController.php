<?php

namespace controllers;

use app\MainController;
use app\Authentication;

class DashboardController extends MainController
{
    private Authentication $auth;
    public function __construct(){
        $this->auth = new Authentication();
    }

    public function index():void{
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "post";
            exit();
        }
        $this->render("mes_donnees", "", ["ui" => "Mes données"]);
    }
    public function compte():void{
        $this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from compte view";
            exit();
        }
        $this->render("compte", "", ["ui" => "Compte"]);
    }

    public function mes_donnees():void{
        //$this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_donnees";
            exit();
        }
        $this->render("mes_donnees", "", ["ui" => "Mes données"]);
    }

    public function mes_essais():void{
        $this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_essais";
            exit();
        }
        $this->render("mes_essais", "", ["ui" => "Mes essais"]);
    }

    public function demande_essai():void{
        $this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_essais";
            exit();
        }
        $this->render("demande_essai", "", ["ui" => "Nouvelle demande d'essai"]);
    }
}