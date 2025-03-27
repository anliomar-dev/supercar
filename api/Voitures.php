<?php

namespace api;
// Assurez-vous que vous envoyez bien le type de contenu JSON
header('Content-Type: application/json; charset=utf-8');

// Désactivez la mise en cache pour voir les résultats en direct
header('Cache-Control: no-cache, must-revalidate');
header('Expires: 0');

class Voitures
{
    public function index(): void{
        echo json_encode(["message" => "salut"]);
    }
}
