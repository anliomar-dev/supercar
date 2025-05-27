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

    public function getUserEmail(int $id_utilisateur): ?string{
        $query = "SELECT email FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
        $statement = $this->_connection->prepare($query);
        $statement->bindValue(':id_utilisateur', $id_utilisateur);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['email'] : null;
    }

    /**
     * return true if the current password of the user is correct, false otherwise
     * @param int $id_utilisateur
     * @param string $current_password
     * @return bool
     */
    public function checkPassword(
        int $id_utilisateur,
        string $current_password,
    ): bool{
        $query = "SELECT mot_de_passe FROM utilisateur WHERE id_utilisateur = :id_utilisateur";
        $statement = $this->_connection->prepare($query);
        $statement->bindValue(':id_utilisateur', $id_utilisateur);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        if(!$result["mot_de_passe"]){
            return false;
        }
        return password_verify($current_password, $result['mot_de_passe']);
    }

    /**
     * return true if the password was updated, false otherwise
     * @param int $id_utilisateur
     * @param string $new_password
     * @return bool
     */
    public function changePassword(int $id_utilisateur, string $new_password): bool {
        $query = "UPDATE utilisateur SET mot_de_passe = :new_password WHERE id_utilisateur = :id_utilisateur";
        $statement = $this->_connection->prepare($query);

        $statement->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
        $statement->bindValue(':new_password', $new_password, PDO::PARAM_STR);

        $statement->execute();

        return $statement->rowCount() > 0;
    }

}