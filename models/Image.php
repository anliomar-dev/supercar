<?php

namespace models;

use app\MainModel;
use PDO;
use PhpParser\Node\Expr\Array_;

class Image extends MainModel
{
    protected string $tableName = 'image';
    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }

    public function getCarImages(int $car_id): array {
        $query = "SELECT url, couleur FROM image WHERE id_modele = :id_voiture";
        $statement = $this->_connection->prepare($query);
        $statement->bindValue(':id_modele', $car_id, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllCars(): array{
        $query = "SELECT id_modele, nom FROM modele";
        $statement = $this->_connection->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

}