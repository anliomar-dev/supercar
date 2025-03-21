<?php

namespace controllers;

use app\MainController;
use models\Voiture; // Import the 'models\Voiture' class

class VoituresController extends MainController
{
    private Voiture $voitureModel;

    /**
     * Constructor for initializing model "Voiture".
     */
    public function __construct()
    {
        // Ensure loadModel returns an instance of models\Voiture
        $this->voitureModel = $this->loadModel("Voiture");
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $param = $_GET["marque"];
        $all_voitures = $this->voitureModel->getAll("voiture");
        echo 'param'. $param . '<br/>';
        var_dump($all_voitures);
    }
}
