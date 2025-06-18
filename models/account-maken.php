<?php
require_once(__DIR__ . "/DBconnection.php");

class AccountModel
{
    public static function register($email, $password, $password2)
    {
        // Stap 1: Input validatie
        echo "<script>console.log('Stap 1: Input ontvangen: email=" . addslashes($email) . "');</script>";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>console.log('Fout: Ongeldig e-mailadres');</script>";
            return "Ongeldig e-mailadres.";
        }
        if (strlen($password) < 6) {
            echo "<script>console.log('Fout: Wachtwoord te kort');</script>";
            return "Wachtwoord moet minimaal 6 tekens zijn.";
        }
        if ($password !== $password2) {
            echo "<script>console.log('Fout: Wachtwoorden komen niet overeen');</script>";
            return "Wachtwoorden komen niet overeen.";
        }

        // Stap 2: DB connectie
        echo "<script>console.log('Stap 2: Verbinden met database...');</script>";
        $db = new DBConnection();
        $conn = $db->connect();

        // Stap 3: Check of e-mail al bestaat
        echo "<script>console.log('Stap 3: Controleren of e-mail bestaat...');</script>";
        $stmt = $conn->prepare("SELECT id FROM gebruikers WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            echo "<script>console.log('Fout: E-mailadres bestaat al');</script>";
            return "E-mailadres is al in gebruik.";
        }

        // Stap 4: Gebruiker toevoegen
        echo "<script>console.log('Stap 4: Gebruiker toevoegen aan database...');</script>";
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO gebruikers (email, wachtwoord) VALUES (:email, :wachtwoord)");
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":wachtwoord", $hashedPassword);
        if ($stmt->execute()) {
            echo "<script>console.log('Succes: Gebruiker toegevoegd!');</script>";
            return ""; // Geen fout, registratie gelukt
        } else {
            echo "<script>console.log('Fout: Insert query mislukt');</script>";
            return "Er is iets misgegaan. Probeer opnieuw.";
        }
    }
}