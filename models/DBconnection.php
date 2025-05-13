<?php

class DBConnection
{
    private $host = 'localhost';
    private $dbname = 'm-v-c';
    private $username = 'root';
    private $password = '';
    private $connection;

    public function connect()
    {
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->connection;
        } catch (PDOException $e) {
            die("Database verbinding mislukt: " . $e->getMessage());
        }
    }
}
?>