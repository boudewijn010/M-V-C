<?php
require_once __DIR__ . '/../models/sales.php';
session_start();
?>
<html>

<head>
    <title>My Web Page</title>
    <link rel="stylesheet" type="text/css" href="../styles/styles.css">
</head>

<body>
    <header>
        <!-- <img src="/img/webshop-icon.jpg" alt="Logo" class="logo" style="height: 100px; width: 100px;"> -->


        <div class="homepage-buttons">
            <?php if (isset($_SESSION["gebruiker_id"])): ?>
                <img src="/img/add-to-card.webp" alt="Add to Cart" class="add-to-cart" style="height: 50px; width: 50px;">
            <?php endif; ?>
            <a href="inloggen.php" class="button">Inloggen</a>
            <a href="account-maken.php" class="button">Account aanmaken</a>
        </div>

        <nav>
            <ul>
                <li><a href="homepage.php">Home</a></li>
                <li><a href="shop.php">shop</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>
</body>

</html>