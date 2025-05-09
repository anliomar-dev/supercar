<?php

namespace models;

use app\MainModel;
use PDO;
use PDOException;

class Marque extends MainModel
{
    protected string $tableName = 'marque';
    public function __construct(array $attributes = []){
        parent::__construct($attributes);
    }

    public function getAllBrands(): array {
        $query = "SELECT * FROM marque";
        $statement = $this->_connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}