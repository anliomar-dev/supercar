<?php

namespace models;

use app\MainModel;

class Marque extends MainModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "marque";
    }
}