<?php

class DBConnection
{
    private $host = 'localhost';
    private $dbname = 'm-v-c';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function connect(): PDO
    {
        try {
            $this->connection = new PDO(
                "mysql:host={$this->host};dbname={$this->dbname}",
                $this->username,
                $this->password
            );
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Debug: Verbinding gelukt
            error_log("DB Verbinding succesvol met {$this->host}/{$this->dbname}");
            return $this->connection;
        } catch (PDOException $e) {
            // Debug: Foutmelding loggen
            error_log("DB Fout: " . $e->getMessage());
            die("Database verbinding mislukt: " . $e->getMessage());
        }
    }
}

// Test de connectie en doe een query
$db = new DBConnection();
$conn = $db->connect();

?>