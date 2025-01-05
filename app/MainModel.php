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
    private ?string $HOST;
    private ?string $DBNAME;
    private ?string $USER;
    private ?string $PASSWORD;
    /**
     * @var ?object
     */
    protected ?object $_connection = null;

    public function __construct() {
        // load environnement variables
        $this->HOST = $_ENV['HOST_DB'] ?? null;
        $this->DBNAME = $_ENV['DB_NAME'] ?? null;
        $this->USER = $_ENV['USER_DB'] ?? null;
        $this->PASSWORD = $_ENV['PASSWORD_DB'] ?? null;
    }

    /**
     * Establishes a connection to the database
     * @return ?PDO
     */
    public function getConnection(): ?PDO
    {
        if ($this->_connection === null) {
            try {
                $this->_connection = new PDO("mysql:host=$this->HOST;dbname=$this->DBNAME", $this->USER, $this->PASSWORD);
                $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->_connection->exec("SET CHARACTER SET utf8");
            } catch (PDOException $exception) {
                echo 'Error while connecting to the database: ' . $exception->getMessage();
                return null;
            }
        }
        return $this->_connection;
    }

    /**
     * this function fetch all rows from a specific table
     * @param $table string the name of table we want to fetch data
     * @return ?array
     */
    public function getAll(string $table): ?array
    {
        try{
            if($this->_connection == null){
                $this->getConnection();
            }
            $query = "SELECT * FROM $table";
            $statement = $this->_connection->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $exception){
            echo 'error while connecting to the database: '. $exception->getMessage();
            return null;
        }
    }

    /**
     * this function get a record from a specific table by a specific column (exp: id)
     * @param $table string the name of the table we want to fetch data
     * @param $column string the name of column we want select by
     * @param $value string|int the value of column
     * @return ?array
     */
    public function getByColumn(string $table, string $column, string|int $value): ?array {
        try{
            if($this->_connection == null){
                $this->getConnection();
            }
            $query = "SELECT * FROM $table WHERE $column = :$column";
            $statement = $this->_connection->prepare($query);
            $statement->bindValue(':'.$column, $value);
            $statement->execute();

            $result = $statement->fetch(PDO::FETCH_ASSOC);
            if ($result === false) {
                return null;
            }
            return $result;
        }catch(PDOException $exception){
            echo 'error while connecting to the database: '. $exception->getMessage();
            return null;
        }
    }

    /**
     * Verifies if a row exists in the database and returns true if the row exists
     * (e.g., when a user creates a new account, it verifies if the entered email already exists in the user table).
     *
     * @param string $table The name of the table where we are searching for the row.
     * @param string $column The name of the column to check for the value.
     * @param string|int $value The value of the column we want to verify the existence of.
     * @return bool Returns true if the row exists in the database, false otherwise.
     */
    public function isRowExists(string $table, string $column, string|int $value): bool {
        try{
            if($this->_connection == null){
                $this->getConnection();
            }
            $query = "SELECT * FROM $table WHERE $column = :$column";
            $statement = $this->_connection->prepare($query);
            $statement->bindValue(':'.$column, $value);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC) != false;
        }catch(PDOException $exception){
            echo 'error while connecting to the database: '. $exception->getMessage();
            return false;
        }

    }

}