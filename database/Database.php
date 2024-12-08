<?php
require_once(__DIR__ . '/../vendor/autoload.php');
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../supercar/');
$dotenv->load();
class Database{
    private $conn;
    public function __construct(){
        // Récupérer les paramètres depuis le fichier .env
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $user = $_ENV['DB_USER'];
        $pass = $_ENV['DB_PASS'];

        try{
            $this->conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo "Erreur de connexion : " . $e->getMessage();
        }
    }

    public function getConnection(){
        return $this->conn;
    }

}