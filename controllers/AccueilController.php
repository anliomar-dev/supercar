<?php

// controllers/client/AccueilController.php
namespace controllers;
use app\MainController;

class AccueilController extends MainController {
    private $imageModele;

    public function __construct(){
        $this->imageModele = $this->loadModel("Image");
    }

    public function index(): void
    {
        $this->render("accueil");
    }

}

