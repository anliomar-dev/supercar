<?php

namespace controllers;

use app\MainController;
use models\Voiture; // Import the 'models\Voiture' class
use app\Paginator;

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
        $marque = isset($_GET["marque"]) ? $_GET["marque"] : "";
        $queryCars = $this->voitureModel->all($marque);
        $currentPage = $_GET['page'] ?? 1;
        $perPage = 5;
        $paginator = new Paginator($this->voitureModel->getConnection(), $queryCars, $perPage, $currentPage);
        $paginatedCars = $paginator->getPaginationData();
        //var_dump($paginationData);
        $this->render("voitures", "", ['paginatedCars' => $paginatedCars]);
    }
}
