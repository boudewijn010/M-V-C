<?php
session_start();
require_once("../models/DBconnection.php");

$error = "";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"] ?? '';
        $wachtwoord = $_POST["password"] ?? '';

        if (empty($email) || empty($wachtwoord)) {
            throw new Exception("E-mail en wachtwoord zijn verplicht.");
        }//tot hier controller

        $db = new DBConnection();
        $conn = $db->connect();

        $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($gebruiker && password_verify($wachtwoord, $gebruiker["wachtwoord"])) {
            session_start();
            $_SESSION["gebruiker_id"] = $gebruiker["id"];
            header("Location: /M-V-C/views/welkom.php");//controller
            exit;
        } else {
            throw new Exception("Ongeldige e-mail of wachtwoord.");
        }
    }
} catch (PDOException $e) {
    $error = "Databasefout: " . $e->getMessage();
} catch (Exception $e) {
    $error = $e->getMessage();
}

require_once("../views/inloggen.php");
inlogView::render($error);//controller
?>