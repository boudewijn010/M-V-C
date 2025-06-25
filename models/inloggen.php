<?php
session_start();
require_once("../models/DBconnection.php");
require_once("../models/inloggen.php");

$error = "";

try {
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST["email"] ?? '';
        $wachtwoord = $_POST["password"] ?? '';

        if (empty($email) || empty($wachtwoord)) {
            throw new Exception("E-mail en wachtwoord zijn verplicht.");
        }

        $gebruiker = InloggenModel::checkLogin($email, $wachtwoord);

        if ($gebruiker) {
            $_SESSION["gebruiker_id"] = $gebruiker["id"];
            header("Location: /M-V-C/views/welkom.php");
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
inlogView::render($error);
?>