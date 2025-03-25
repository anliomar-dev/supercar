<?php

namespace models;

use app\MainModel;
use PDO;
use PDOException;

class Marque extends MainModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "marque";
    }

    public function getAllBrands() {
        $query = "SELECT * FROM marque";
        $statement = $this->_connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}