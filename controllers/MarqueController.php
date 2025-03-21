<?php

namespace controllers;

use app\MainController;
use app\Paginator;
use models\Marque;

class MarqueController extends MainController
{
    private Marque $marqueModel;

    /**
     * Constructor for initializing model "Marque".
     */
    public function __construct()
    {
        $this->marqueModel = $this->loadModel("Marque");
    }

    /**
     * @return void
     */
    public function index(): void
    {
        $all_marques = $this->marqueModel->getAll("marque");
        var_dump($all_marques);
    }

    public function all(): void
    {
        $query = "SELECT * FROM marque";
        $currentPage = $_GET['page'] ?? 1;
        $perPage = 2;
        //$all_marques = $marqueModel->getAll("marque");
        $paginator = new Paginator($this->voitureModel->getConnection(), $query, $perPage, $currentPage);
        $paginationData = $paginator->getPaginationData();
        var_dump($paginationData);

    }

    public function getByColumn(array $params): void {
        $column_name = key($params);
        $value = $params[$column_name];
        $marque = $this->marqueModel->getByColumn([$column_name => $value]);
        var_dump($marque);
    }
}