<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Welkom</title>
    <link rel="stylesheet" type="text/css" href="/M-V-C/styles/styles.css">
    <link rel="stylesheet" type="text/css" href="/M-V-C/styles/welkom.css">
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <script>
        window.onload = function() {
            confetti({
                particleCount: 150,
                spread: 70,
                origin: { y: 0.6 }
            });
        };
    </script>
</head>
<body>
<?php
require_once("header.php");
?>
<div class="container">
    <h1>Welkom!</h1>
    <p>Je bent succesvol ingelogd.</p>
    <a href="logout.php">Uitloggen</a>
</div>
</body>
</html>