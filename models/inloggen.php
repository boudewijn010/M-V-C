<?php
require_once("../models/DBconnection.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    $db = new DBConnection();
    $conn = $db->connect();

    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($gebruiker && password_verify($password, $gebruiker["password"])) {
        session_start();
        $_SESSION["gebruiker_id"] = $gebruiker["id"];
        header("Location: welkom.php");
        exit;
    } else {
        $error = "Ongeldige e-mail of wachtwoord.";
    }
}
?>