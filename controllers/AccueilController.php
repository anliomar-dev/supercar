<?php

// controllers/client/AccueilController.php
namespace controllers;
use app\MainController;

class AccueilController extends MainController {
    public function index(): void
    {
        $imageModel = $this->loadModel("Image");
        require_once ROOT.'views\accueil.php';
        $this->render("accueil");
    }
}

