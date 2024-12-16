<?php

namespace controllers\client;

use app\MainController;
use app\Paginator;

class MarqueController extends MainController
{
    /**
     * @return void
     */
    public function index(): void
    {
        $marqueModel = $this->loadModel("Marque");
        $all_marques = $marqueModel->getAll("marque");
        var_dump($all_marques);
    }
    public function all(): void
    {
        $marqueModel = $this->loadModel("Marque");
        $query = "SELECT * FROM marque";
        $currentPage = $_GET['page'] ?? 1;
        $perPage = 2;
        $marqueModel = $this->loadModel("Marque");
        //$all_marques = $marqueModel->getAll("marque");
        $paginator = new Paginator($marqueModel->getConnection(), $query, $perPage, $currentPage);
        $paginationData = $paginator->getPaginationData();
        var_dump($paginationData);

    }

    public function getByColumn(string $table, string $column, string|int $value): void {
        $marqueModel = $this->loadModel("Marque");
        $marque = $marqueModel->getByColumn($table, $column, $value);
        var_dump($marque);
    }
}