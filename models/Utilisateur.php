<?php

namespace models;

use app\MainModel;
use PDO;
use PDOException;

class Utilisateur extends MainModel
{
    protected string $tableName = 'utilisateur';
    public function __construct(array $attributes = []) {
        parent::__construct($attributes);
    }

    /**
     * the function authenticated a user and an associative array that contains user infor
     * @param string $email
     * @param string $password
     * @return ?array
     */
    public function authenticate_user(string $email, string $password): ?array {
        try{
            $query = "SELECT 
                    id_utilisateur, prenom, nom, email, est_admin, est_superadmin, mot_de_passe 
                    FROM utilisateur WHERE email = :email";

            $statement = $this->_connection->prepare($query);
            $statement->bindValue(':email', $email);
            $statement->execute();
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if($result && password_verify($password, $result["mot_de_passe"])){
                unset($result["mot_de_passe"]);
                return $result;
            }
            return null;
        }catch(PDOException $e){
            error_log('Database error: ' . $exception->getMessage());
            return null;
        }
    }
}