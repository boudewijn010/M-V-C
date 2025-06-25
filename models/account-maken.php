<?php
require_once(__DIR__ . "/DBconnection.php");

class AccountModel
{
    public static function register($email, $password, $password2)
    {
        // Stap 1: Input validatie
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "Ongeldig e-mailadres.";
        }
        if (strlen($password) < 6) {
            return "Wachtwoord moet minimaal 6 tekens zijn.";
        }
        if ($password !== $password2) {
            return "Wachtwoorden komen niet overeen.";
        }

        // Stap 2: DB connectie via singleton
        $db = DBConnection::getInstance();
        $conn = $db->connect();

        // Stap 3: Check of e-mail al bestaat
        $stmt = $conn->prepare("SELECT id FROM gebruikers WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            return "E-mailadres is al in gebruik.";
        }

        // Stap 4: Gebruiker toevoegen
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO gebruikers (email, wachtwoord) VALUES (:email, :wachtwoord)");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":wachtwoord", $hashedPassword);
        if ($stmt->execute()) {
            return ""; // Succes
        } else {
            return "Er is iets misgegaan. Probeer opnieuw.";
        }
    }
}