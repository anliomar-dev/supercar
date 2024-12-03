<?php
namespace controllers\client;
use models\Utilisateur;

class User
{
    public function showUsers()
    {
        // Créer une instance de la classe Utilisateur
        $utilisateurModel = new Utilisateur();

        // Récupérer tous les utilisateurs
        $users = $utilisateurModel->getAllUsers();
        extract(['users' => $users]);
        include(__DIR__ . '/../../views/admin/users.php');  // Remplace ce chemin par ton chemin réel
    }
}