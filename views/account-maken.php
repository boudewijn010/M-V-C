<?php
require_once("../models/DBconnection.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Ongeldig e-mailadres.";
    } elseif (strlen($password) < 6) {
        $error = "Wachtwoord moet minimaal 6 tekens zijn.";
    } else {
        $db = new DBConnection();
        $conn = $db->connect();

        // Controleer of e-mail al bestaat
        $stmt = $conn->prepare("SELECT id FROM gebruikers WHERE email = :email");
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if ($stmt->fetch()) {
            $error = "E-mailadres is al in gebruik.";
        } else {
            // Voeg gebruiker toe
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO gebruikers (email, wachtwoord) VALUES (:email, :wachtwoord)");
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":wachtwoord", $hashedPassword);
            if ($stmt->execute()) {
                header("Location: inloggen.php");
                exit;
            } else {
                $error = "Er is iets misgegaan. Probeer opnieuw.";
            }
        }
    }
}
?>

<link rel="stylesheet" href="inloggen.css">

<div class="container">
    <div class="heading">Sign up</div>
    <form action="" method="post" class="form">
        <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
        <input required class="input" type="password" name="password" id="password" placeholder="Password">
        <input class="login-button" type="submit" value="Sign up">
        <div class="register-link">
            <a class="maken" href="inloggen.php">Al een account? Log in!</a>
            <?php if (!empty($error)): ?>
                <div style="color:red; text-align:center; margin-top:10px;"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
        </div>
    </form>
</div>