<?php
require_once __DIR__ . '/../models/product.php';
session_start();

class CartView
{

    public static function render()
    {
        $cart = $_SESSION['cart'] ?? [];
        $producten = [];
        $totaal = 0;

        if ($cart) {
            foreach ($cart as $id => $aantal) {
                $product = ProductModel::getById($id);
                if ($product) {
                    $product['aantal'] = $aantal;
                    $producten[] = $product;
                    $totaal += $product['prijs'] * $aantal;
                }
            }
        }
        ?>
        <!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <title>Shopping Cart</title>
            <link rel="stylesheet" href="/M-V-C/styles/styles.css">
        </head>
        <body>
        <?php
        require_once __DIR__ . '/header.php';
        HeaderView::render();
        ?>
        <main>
            <h1>Shopping Cart</h1>
            <?php if (empty($producten)): ?>
                <p>Your cart is empty.</p>
            <?php else: ?>
                <ul class="cart-list">
                    <?php foreach ($producten as $product): ?>
                        <li class="cart-item">
                            <img src="<?= htmlspecialchars($product['foto']) ?>" alt="<?= htmlspecialchars($product['product']) ?>">
                            <div class="cart-info">
                                <h3><?= htmlspecialchars($product['product']) ?></h3>
                                <div class="prijs">€<?= htmlspecialchars($product['prijs']) ?></div>
                                <div class="aantal">Aantal: <?= $product['aantal'] ?></div>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="cart-total">
                    Totaal: €<?= number_format($totaal, 2) ?>
                </div>
                <a href="/M-V-C/controllers/bedankt.php">
                    <button class="checkout-btn" type="button">Afrekenen</button>
                </a>
            <?php endif; ?>
        </main>
        <?php require_once __DIR__ . '/footer.php'; ?>
        </body>
        </html>
        <?php
    }
}