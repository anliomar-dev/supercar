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

  /**
   * Function to retrieve all cars, with an optional filter by brand.
   * 
   * @param $marque string (optional) The name of the brand to filter the results.
   * @return array
   */
  public function all(string $marque = ""){
    $query = "
      SELECT voiture.id_voiture, 
        voiture.nom AS nom_model, 
        voiture.prix, 
        voiture.moteur, 
        voiture.transmission, 
        marque.nom AS nom_marque 
      FROM voiture 
      JOIN marque 
      ON voiture.id_marque = marque.id_marque
    ";
    if (!empty($marque)) {
      $query .= " WHERE marque.nom = '" . addslashes($marque) . "'"; 
    }
    return $query;
  }
}