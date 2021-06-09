<?php
namespace App\DB;
use PDO;
use PDOException;

class Mysqli
{
    private $connection;
    private $db_name = "ordini";
    private $user = "root";
    private $password = "root";
    private $host = "localhost:3306";
    private $charset = "utf8";

    private function setupConnection() {
        try {
            $this->connection = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->user . ";charset=" . this.$this->charset, $this->password);
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
            $result = $statement->setFetchMode(PDO::FETCH_ASSOC);
            $this->connection = null;
            return $result;
        } catch (\Exception $error) {
            return $error->getMessage();
        }
    }
}