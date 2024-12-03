<?php

namespace models;

// Assurez-vous que la classe Database est correctement référencée avec le namespace
require_once __DIR__ . '/../database/Database.php';

use Database;
use PDO;

class Utilisateur
{
    public function getAllUsers()
    {
        try {
            $db = new Database();
            $conn = $db->getConnection();

            $query = "SELECT * FROM utilisateur";
            $stmt = $conn->prepare($query);
            $stmt->execute();

            // Retourner les utilisateurs sous forme de tableau
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\PDOException $e) {
            echo "Erreur lors de la récupération des utilisateurs : " . $e->getMessage();
            return [];
        }
    }


}
