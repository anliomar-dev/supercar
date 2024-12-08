<?php

namespace controllers\client;

use app\MainController;

class Marque extends MainController
{
    public function index() {
        $marqueModel = $this->loadModel("Marque");
        $all_marques = $marqueModel->getAll("marque");
        var_dump($all_marques);
    }
    public function all() {
        $marqueModel = $this->loadModel("Marque");
        $all_marques = $marqueModel->getAll("marque");
        var_dump($all_marques);
    }


}