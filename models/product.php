<?php

require_once __DIR__ . '/DBconnection.php';

class ProductModel
{
    public static function getAll()
    {
        $db = new DBConnection();
        $conn = $db->connect();

        $stmt = $conn->query("SELECT product, prijs, omschrijving, foto, id FROM producten");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function add($product, $prijs, $omschrijving, $foto)
    {
        $db = new DBConnection();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO producten (product, prijs, omschrijving, foto) VALUES (:product, :prijs, :omschrijving, :foto)");
        $stmt->bindParam(':product', $product);
        $stmt->bindParam(':prijs', $prijs);
        $stmt->bindParam(':omschrijving', $omschrijving);
        $stmt->bindParam(':foto', $foto);

        return $stmt->execute();
    }

    public static function getById($id)
    {
        $db = new DBConnection();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM producten WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}