<?php

// controllers/client/Accueil.php
namespace controllers\client;
use app\MainController;

class Accueil extends MainController {
    public function index(): void
    {
        $imageModel = $this->loadModel("Image");
        require_once ROOT.'views\client\accueil.php';
        $this->render("accueil");
    }
}

