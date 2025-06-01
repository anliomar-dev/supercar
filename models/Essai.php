<?php

    namespace models;

    use app\MainModel;
    use PDO;
    use PhpParser\Node\Expr\Array_;

    class Essai extends MainModel
    {
        protected string $tableName = 'essai';
        public function __construct(array $attributes = []) {
            parent::__construct($attributes);
        }

        public function findAllCurrentUserTestsDrives(int $id_utilisateur): array{
            $query = "
                SELECT essai.*, modele.nom AS nom_modele, marque.nom AS nom_marque
                FROM essai
                JOIN modele on modele.id_modele = essai.id_modele
                JOIN marque on marque.id_marque = modele.id_marque
                WHERE id_utilisateur = :id_utilisateur;
            ";
            $statement = $this->_connection->prepare($query);
            $statement->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
    }