<?php

class DBConnection
{
    private $host = 'localhost';
    private $dbname = 'm-v-c';
    private $username = 'root';
    private $password = '';
    private static $instance = null;
    private $connection = null;

    // Private constructor om singleton pattern te implementeren
    private function __construct()
    {
    }

    // Clone voorkomen
    private function __clone()
    {
    }

    // Serialize voorkomen
    public function __wakeup()
    {
    }

    // Singleton instance ophalen
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    // Database verbinding maken
    public function connect(): PDO
    {
        if ($this->connection === null) {
            try {
                $this->connection = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname}",
                    $this->username,
                    $this->password
                );
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

                // Debug: Verbinding gelukt
                error_log("DB Verbinding succesvol met {$this->host}/{$this->dbname}");
            } catch (PDOException $e) {
                // Debug: Foutmelding loggen
                error_log("DB Fout: " . $e->getMessage());
                die("Database verbinding mislukt: " . $e->getMessage());
            }
        }
        return $this->connection;
    }

    // Verbinding sluiten
    public function disconnect(): void
    {
        $this->connection = null;
    }
}

?>