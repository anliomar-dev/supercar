<?php

namespace controllers;

use app\MainController;
use app\Authentication;
use models\Marque;

class DashboardController extends MainController
{
    private Authentication $auth;
    private Marque $marqueModel; 
    
    public function __construct(){
        $this->auth = new Authentication();
        $this->marqueModel = new Marque();
    }

    public function index():void{
        header('Location: /supercar/dashboard/mes_donnees');
    }

    public function compte():void{
        //$this->auth->is_authenticated();
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
        //$this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_essais";
            exit();
        }
        $this->render("mes_essais", "", ["ui" => "Mes essais"]);
    }

    public function demande_essai():void{
        //$this->auth->is_authenticated();
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo "posted from mes_essais";
            exit();
        }
        $all_brands = $this->marqueModel->getAllBrands();
        $this->render("demande_essai", "", ["all_brands" => $all_brands]);
    }
}