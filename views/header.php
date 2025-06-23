<?php
class HeaderView
{
    public static function render()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        ?>
        <header>
            <div class="homepage-buttons">
                <?php if (isset($_SESSION["gebruiker_id"])): ?>
                    <img src="/img/add-to-card.webp" alt="Add to Cart" class="add-to-cart" style="height: 50px; width: 50px;">
                <?php else: ?>
                    <a href="/M-V-C/controllers/inloggen.php" class="button">Inloggen</a>
                    <a href="/M-V-C/controllers/account-maken.php" class="button">Account aanmaken</a>
                <?php endif; ?>
                <a href="/M-V-C/controllers/cart.php" class="button">Shopping Cart</a>
            </div>
            <nav>
                <ul>
                    <li><a href="/M-V-C/controllers/homepage.php">Home</a></li>
                    <li><a href="/M-V-C/controllers/shop.php">Shop</a></li>
                    <li><a href="/M-V-C/controllers/about-us.php">About Us</a></li>
                    <li><a href="/M-V-C/controllers/contact.php">Contact</a></li>
                </ul>
            </nav>
        </header>
        <?php
    }
}