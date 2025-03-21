<?php

namespace models;

use app\MainModel;

class Voiture extends MainModel
{
  public function __construct()
  {
    parent::__construct();
    $this->tableName = "voiture";
  }

  public function all($marque){

  }

}