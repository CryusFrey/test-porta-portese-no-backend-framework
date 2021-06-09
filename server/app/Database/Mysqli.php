<?php
namespace App\Database;
use PDO;
use PDOException;

class Mysqli
{
    private $connection;
    private $db_name = "test";
    private $user = "root";
    private $password = "root";
    private $host = "localhost:3306";
    private $charset = "utf8";

    private function setupConnection() {
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name . ";charset=" . $this->charset;
        try {
            $this->connection = new PDO($dsn,$this->user, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function query($query) {
        try {
            $this->setupConnection();
            $statement = $this->connection->prepare($query);
            $statement->execute();
            $statement->setFetchMode(PDO::FETCH_ASSOC);
            $result = $statement->fetchAll();
            $this->connection = null;
            return $result;
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }
}