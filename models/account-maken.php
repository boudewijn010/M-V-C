<?php
require_once(__DIR__ . "/DBconnection.php");

class AccountModel
{
    public static function register($email, $password, $password2)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Ongeldig e-mailadres.";
        }
        if (strlen($password) < 6) {
            return "Wachtwoord moet minimaal 6 tekens zijn.";
        }
        if ($password !== $password2) {
            return "Wachtwoorden komen niet overeen.";
        }

        $db = new DBConnection();
        $conn = $db->connect();

        // Controleer of e-mail al bestaat
        $stmt = $conn->prepare("SELECT id FROM gebruikers WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            return "E-mailadres is al in gebruik.";
        }

        // Voeg gebruiker toe
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO gebruikers (email, wachtwoord) VALUES (:email, :wachtwoord)");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":wachtwoord", $hashedPassword);
        if ($stmt->execute()) {
            return ""; // Geen fout, registratie gelukt
        } else {
            return "Er is iets misgegaan. Probeer opnieuw.";
        }
    }
}