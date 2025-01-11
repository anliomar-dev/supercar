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
    /**
     * Get the value of the attribute specified by the key.
     *
     * This method retrieves the value of an attribute stored in the `attributes` array
     * using the provided key.
     *
     * @param string $key The key of the attribute to retrieve.
     * @return mixed The value of the attribute, or null if the key does not exist.
     */
    public function getAttribute(string $key): mixed {
        return $this->attributes[$key] ?? null;  // To handle cases where the key doesn't exist
    }

    /**
     * Set the value of the attribute specified by the key.
     *
     * This method updates the value of an attribute stored in the `attributes` array
     * using the provided key. The new value can be any type (string, numeric, etc.).
     *
     * @param string $key The key of the attribute to update.
     * @param mixed $new_value The new value to set for the specified attribute.
     * @return void
     */
    public function setAttribute(string $key, mixed $new_value): void
    {
        $this->attributes[$key] = $new_value;
    }

    // database
    private ?string $HOST, $DBNAME, $USER, $PASSWORD, $TESTS_MODE;
    /**
     * @var ?PDO
     */
    protected ?PDO $_connection = null;
    private array $attributes; // An associative array that contains key-value pairs,
    // where each key represents a column of the table.
    protected string $tableName; // The name of the table where we want to insert a new row.

    public function __construct(array $attributes = []) {
        // load environnement variables
        $this->HOST = $_ENV['HOST_DB'] ?? null;
        $this->DBNAME = $_ENV['DB_NAME'] ?? null;
        $this->USER = $_ENV['USER_DB'] ?? null;
        $this->PASSWORD = $_ENV['PASSWORD_DB'] ?? null;
        $this->TESTS_MODE = $_ENV['TESTS_MODE'] ?? null;
        foreach ($attributes as $key => $value) {
            $this->attributes[$key] = $value;
        }
        $this->getConnection();
    }

    /**
     * Establishes a connection to the database
     * @return ?PDO
     */
    public function getConnection(): ?PDO
    {
        if ($this->_connection === null) {
            try {
                if($this->TESTS_MODE === "true"){
                    $this->_connection = new PDO('sqlite:' . ROOT. 'tests_db.sqlite3');
                }else{
                    $this->_connection = new PDO("mysql:host=$this->HOST;dbname=$this->DBNAME", $this->USER, $this->PASSWORD);
                }
                $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->_connection->exec("SET CHARACTER SET utf8");
            } catch (PDOException $exception) {
                error_log('Database error: ' . $exception->getMessage());
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
            $query = "SELECT * FROM $this->tableName";
            $statement = $this->_connection->query($query);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $exception){
            error_log('Database error: ' . $exception->getMessage());
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
            error_log('Database error: ' . $exception->getMessage());
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
            $query = "SELECT * FROM $table WHERE $column = :$column";
            $statement = $this->_connection->prepare($query);
            $statement->bindValue(':'.$column, $value);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC) != false;
        }catch(PDOException $exception){
            error_log('Database error: ' . $exception->getMessage());
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
    public static function create(array $attributes): array|null
    {
        try {
            // Check if the connection is established
            // Create an instance and attempt to save
            $instance = new static($attributes);
            $saved = $instance->save();
            return $saved ? $instance->attributes : null;
        }catch (PDOException $exception) {
            // Log the error to a file rather than displaying it
            error_log('Database error: ' . $exception->getMessage());
            return null;
        }
    }


    /**
     * the function insert or update a row in a table
     * @return static|null
     */
    public function save(): static|null
    {
        try {
            // If ID is set, perform an update, otherwise perform an insertion
            if (isset($this->attributes["id_$this->tableName"]) && !empty($this->attributes["id_$this->tableName"])) {
                return $this->update();
            } else {
                return $this->insert();
            }
        } catch (PDOException $exception) {
            error_log('Database error: ' . $exception->getMessage());
            return null;
        }
    }


    /**
     * Insert a new row into the database table.
     *
     * This method prepares and executes an SQL query to insert a new row into the database table
     * using the attributes provided in the current instance. If the insertion is successful,
     * it assigns the last inserted ID to the `id_<tableName>` attribute and returns the current
     * instance. If an error occurs, it logs the error and returns `null`.
     *
     * @return static|null Returns the current instance if the insert is successful;
     *                     returns `null` if the insertion fails.
     */
    private function insert(): static|null
    {
        try {
            $fields = implode(', ', array_keys($this->attributes));
            $placeholders = ":" . implode(", :", array_keys($this->attributes));
            $query = "INSERT INTO {$this->tableName} ({$fields}) VALUES ({$placeholders})";
            $statement = $this->getConnection()->prepare($query);

            foreach ($this->attributes as $key => $value) {
                $statement->bindValue(":$key", $value);
            }
            if ($statement->execute()) {
                // If it's a new row insertion, this assigns the last inserted ID from
                // the database to the id_<tableName> attribute and returns the current instance.
                $this->attributes["id_$this->tableName"] = $this->_connection->lastInsertId();
                return $this;
            } else {
                error_log('Échec de l\'insertion dans la base de données: ' . implode(', ', $statement->errorInfo()));
                return null;
            }
        } catch (PDOException $exception) {
            error_log('Erreur de la base de données: ' . $exception->getMessage());
            return null;
        }
    }


    /**
     * Update an existing row in the database table.
     *
     * This method prepares and executes an SQL query to update an existing row in the database table
     * based on the current values in the attributes array. The query updates all fields except for the
     * `id_<tableName>` field. If the update is successful, it returns the current instance. If the update
     * fails, it returns `null`.
     *
     * @return static|null Returns the current instance if the update is successful;
     *                     returns `null` if the update fails.
     */
    private function update(): static|null
    {
        $fields = [];
        /**
         * create the placeholders for each key of the attributes aray
         * e.g: fileds = ["email = :email", "phone = :phone"]
         */
        foreach ($this->attributes as $key => $value) {
            if ($key !== "id_$this->tableName") {
                $fields[] = "$key = :$key";
            }
        }
        // create the set CLAUSE. e.g(email = :email, phone = :phone)
        $setClause = implode(", ", $fields);
        $idColumn = "id_" . $this->tableName;
        $query = "UPDATE {$this->tableName} SET {$setClause} WHERE {$idColumn} = :{$idColumn}";
        $statement = $this->getConnection()->prepare($query);

        if ($statement->execute($this->attributes)) {
            return $this;
        }
        return null;
    }


    public function delete(int $id): bool{
        return true;
    }


    public function filter(array $filters): void{
        //
    }
}