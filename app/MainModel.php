<?php

namespace app;
use PDO;
use PDOException;

$rootPath = realpath(__DIR__ . '/../'); // 'realpath' is used to resolve the absolute path

// Include the Composer autoloader
require_once $rootPath . '/vendor/autoload.php';

// Load the .env file located at the root of the project
use Dotenv;
$dotenv = Dotenv\Dotenv::createImmutable($rootPath);
$dotenv->load();

abstract class MainModel
{
    private $HOST;
    private $DBNAME;
    private $USER;
    private $PASSWORD;
    /**
     * @var null
     */
    private $_connection;

    public function __construct() {
        // load environnement variables
        $this->HOST = isset($_ENV['HOST_DB']) ? $_ENV['HOST_DB'] : null;
        $this->DBNAME = isset($_ENV['DATABASENAME']) ? $_ENV['DATABASENAME'] : null;
        $this->USER = isset($_ENV['USER_DB']) ? $_ENV['USER_DB'] : null;
        $this->PASSWORD = isset($_ENV['PASSWORD_DB']) ? $_ENV['PASSWORD_DB'] : null;
    }

    public function getConnection(){
        try{
            $this->_connection = new PDO("mysql:host=$this->HOST;dbname=$this->DBNAME", $this->USER, $this->PASSWORD);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->_connection->exec("SET CHARACTER SET utf8");
        }catch(PDOException $exception){
            echo 'error while connecting to the database: '. $exception->getMessage();
        }
    }
}