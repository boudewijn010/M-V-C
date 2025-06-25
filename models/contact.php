<?php
require_once __DIR__ . '/DBconnection.php';

class ContactModel
{
    public static function saveContact($naam, $email, $bericht)
    {
        $db = DBConnection::getInstance();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO contact (naam, email, bericht) VALUES (?, ?, ?)");
        return $stmt->execute([$naam, $email, $bericht]);
    }
}