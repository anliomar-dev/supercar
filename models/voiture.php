<?php

namespace models;

use app\MainModel;
use PDO;

class Voiture extends MainModel
{
  public function __construct()
  {
    parent::__construct();
    $this->tableName = "voiture";
  }

    /**
     * This function return a query that retrieve all cars, with an optional filter by brand.
     *
     * @param $marque string (optional) The name of the brand to filter the results.
     * @return array|string
     */
  public function all(string $marque = ""): array|string
  {
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

    /**
     * Function to retrieve all cars, with an optional filter by brand.
     *
     * @param int $brandId of the brand we want to get all cars
     * @return array|string
     */
    public function allCarsByBrand(int $brandId): array|string
    {
        $query = "SELECT voiture.id_voiture, voiture.nom
          FROM voiture
          WHERE id_marque = $brandId;";
        $statement = $this->_connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}