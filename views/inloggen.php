<?php
require_once("../models/DBconnection.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"] ?? '';
    $password = $_POST["password"] ?? '';

    $db = new DBConnection();
    $conn = $db->connect();

    // Zoek gebruiker op basis van e-mail
    $stmt = $conn->prepare("SELECT * FROM gebruikers WHERE email = :email");
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    $gebruiker = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($gebruiker && password_verify($password, $gebruiker["wachtwoord"])) {
        // Inloggen gelukt
        session_start();
        $_SESSION["gebruiker_id"] = $gebruiker["id"];
        header("Location: dashboard.php"); // Pas aan naar jouw dashboard/bestemming
        exit;
    } else {
        $error = "Ongeldige e-mail of wachtwoord.";
    }
}
?>

<head>
    <link rel="stylesheet" href="inloggen.css">
</head>

<div class="container">
    <div class="heading">Sign In</div>
    <form action="" method="post" class="form">
        <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
        <input required class="input" type="password" name="password" id="password" placeholder="Password">
        <input class="login-button" type="submit" value="Sign In">
        <div class="register-link">
            <a class="maken" href="account-maken.php">Nog geen account? Maak er een aan!</a>
            <?php if (!empty($error)): ?>
                <div style="color:red; text-align:center; margin-top:10px;"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
    </form>
</div>