<?php

namespace models;

use app\MainModel;

class Essai extends MainModel
{
    public function __construct()
    {
        parent::__construct();
        $this->tableName = "essais";
    }


}