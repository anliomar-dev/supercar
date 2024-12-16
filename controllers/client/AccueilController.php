<?php

// controllers/client/AccueilController.php
namespace controllers\client;
use app\MainController;

class AccueilController extends MainController {
    public function index(): void
    {
        $imageModel = $this->loadModel("Image");
        require_once ROOT.'views\client\accueil.php';
        $this->render("accueil");
    }
}

