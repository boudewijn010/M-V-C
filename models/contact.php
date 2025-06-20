<?php
require_once __DIR__ . '/DBconnection.php';

class ContactModel
{
    public static function save($naam, $email, $bericht)
    {
        $db = new DBConnection();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO contact (naam, email, bericht) VALUES (:naam, :email, :bericht)");
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':bericht', $bericht);

        return $stmt->execute();
    }
}
?>