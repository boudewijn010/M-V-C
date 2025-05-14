<?php
require_once __DIR__ . '/../models/DBconnection.php';

class Sales
{
    private $db;

    public function __construct()
    {
        $this->db = new DBConnection();
    }

    public function getAllSales()
    {
        $query = "SELECT * FROM sales";
        $stmt = $this->db->connect()->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>