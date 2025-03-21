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
        marque.nom AS nom_marque,
        marque.logo AS marque_logo,
        MIN(image_voiture.url) AS url_image
      FROM voiture
      JOIN marque ON voiture.id_marque = marque.id_marque
      LEFT JOIN image_voiture ON voiture.id_voiture = image_voiture.id_voiture
    ";
    if (!empty($marque)) {
      $query .= " WHERE marque.nom = '" . addslashes($marque) . "'"; 
    }
    $query .= " GROUP BY voiture.id_voiture";
    return $query;
  }
}