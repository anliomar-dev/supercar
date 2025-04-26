<?php

namespace models;

use app\MainModel;
use PDO;

class Voiture extends MainModel
{
  public function __construct()
  {
    parent::__construct();
    $this->tableName = "modele";
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
      SELECT modele.id_modele, 
        modele.nom AS nom_model, 
        modele.prix, 
        modele.moteur, 
        modele.transmission, 
        marque.nom AS nom_marque,
        marque.logo AS marque_logo,
        MIN(image.url) AS url_image
      FROM modele
      JOIN marque ON modele.id_marque = marque.id_marque
      LEFT JOIN image ON modele.id_modele = image.id_modele
    ";
    if (!empty($marque)) {
      $query .= " WHERE marque.nom = '" . addslashes($marque) . "'"; 
    }
    $query .= " GROUP BY modele.id_modele";
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
        $query = "SELECT modele.id_modele, modele.nom
          FROM modele
          WHERE id_marque = $brandId;";
        $statement = $this->_connection->query($query);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }
}