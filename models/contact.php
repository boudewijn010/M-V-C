<?php
class Contact
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function saveContact($naam, $email, $bericht)
    {
        $stmt = $this->db->prepare("INSERT INTO contact (naam, email, bericht) VALUES (?, ?, ?)");
        return $stmt->execute([$naam, $email, $bericht]);
    }
}
?>