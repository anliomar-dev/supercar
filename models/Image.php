<?php

namespace models;

use app\MainModel;
use PDO;
use PhpParser\Node\Expr\Array_;

class Image extends MainModel
{

    public function __construct()
    {
        parent::__construct();
        $this->tableName = "image_voiture";
    }

    public function getCarImages(int $car_id): array {
        $query = "SELECT url, couleur FROM image_voiture WHERE id_voiture = :id_voiture";
        $statement = $this->_connection->prepare($query);
        $statement->bindValue(':id_voiture', $car_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}