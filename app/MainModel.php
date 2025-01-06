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
    // database
    private ?string $HOST, $DBNAME, $USER, $PASSWORD;
    /**
     * @var ?PDO
     */
    protected ?PDO $_connection = null;
    private mixed $attributes; // An associative array that contains key-value pairs, where each key represents a column of the table.

    protected string $tableName; // The name of the table where we want to insert a new row.

    public function __construct(array $attributes = []) {
        // load environnement variables
        $this->HOST = $_ENV['HOST_DB'] ?? null;
        $this->DBNAME = $_ENV['DB_NAME'] ?? null;
        $this->USER = $_ENV['USER_DB'] ?? null;
        $this->PASSWORD = $_ENV['PASSWORD_DB'] ?? null;

        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
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
            $query = "SELECT * FROM $this->tableName";
            $statement = $this->_connection->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $exception){
            echo 'error while connecting to the database: '. $exception->getMessage();
            return null;
        }
    }

    /**
     * this function get a record from a specific table by a specific column (exp: id)
     * @param array $params
     * @return ?array
     */
    public function getByColumn(array $params): ?array {
        try{
            if($this->_connection == null){
                $this->getConnection();
            }
            $column = key($params); // La clé du tableau, c'est le nom de la colonne
            $value = $params[$column];

            $query = "SELECT * FROM $this->tableName WHERE $column = :value";
            $statement = $this->_connection->prepare($query);
            $statement->bindValue(':value', $value);
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

    /**
     * Creates a new instance of the class with the provided attributes and saves it to the database.
     *
     * This method is static and uses "late static binding" to return an instance of the class
     * that calls the method (either the parent class or a subclass).
     *
     * @param array $attributes An associative array containing the attributes to initialize for the instance.
     *                          Each key in the array corresponds to an attribute name, and each value to its value.
     *
     * @return static|null The instance of the class (either the current class or a subclass) with the attributes initialized.
     */
    public static function create(array $attributes): static|null
    {
        // Create an instance and attempt to save
        $instance = new static($attributes);
        $saved = $instance->save();
        return $saved ? $instance : null;
    }


    /**
     * the function insert or update a row in a table
     * @return $this|null
     */
    public function save(): static|null
    {
        try {
            // Check if the connection is established
            if ($this->_connection === null) {
                $this->getConnection();
            }

            // If ID is set, perform an update, otherwise perform an insertion
            if (isset($this->attributes['id']) && !empty($this->attributes['id'])) {
                return $this->update();
            } else {
                return $this->insert();
            }
        } catch (PDOException $exception) {
            // Log the error to a file rather than displaying it
            error_log('Database error: ' . $exception->getMessage());
            return null;
        }
    }

    private function insert(): static|null
    {
        // Prepare the insert query
        $fields = implode(', ', array_keys($this->attributes));
        $placeholders = ":" . implode(", :", array_keys($this->attributes));
        $query = "INSERT INTO {$this->tableName} ({$fields}) VALUES ({$placeholders})";

        $stmt = $this->getConnection()->prepare($query);

        // Bind the attribute values to the placeholders
        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Execute the query
        if ($stmt->execute()) {
            // If it's a new row, set the ID
            $this->attributes['id'] = $this->_connection->lastInsertId();
            return $this;
        }

        return null;
    }

    private function update(): static|null
    {
        // Prepare the update query
        $fields = [];
        foreach ($this->attributes as $key => $value) {
            if ($key !== 'id') {  // Don't update the ID
                $fields[] = "$key = :$key";
            }
        }

        $setClause = implode(", ", $fields);
        $query = "UPDATE {$this->tableName} SET {$setClause} WHERE id = :id";

        $stmt = $this->getConnection()->prepare($query);

        // Bind the attribute values to the placeholders
        foreach ($this->attributes as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // Execute the query
        if ($stmt->execute()) {
            return $this;
        }

        return null;
    }

    public function delete(): bool{
        return true;
    }

    public function filter(array $filters): void{
        //
    }
}