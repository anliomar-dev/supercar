<?php

namespace controllers\client;

use app\MainController;

class Marque extends MainController
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
        $all_marques = $marqueModel->getAll("marque");
        var_dump($all_marques);
    }

    public function getByColumn(string $table, string $column, string|int $value) {
        $marqueModel = $this->loadModel("Marque");
        $marque = $marqueModel->getByColumn($table, $column, $value);
        var_dump($marque);
    }
}