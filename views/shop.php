<?php
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/header.php';

class ShopView
{
    public static function render()
    {
        $producten = ProductModel::getAll();
        ?>
        <!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <title>Shop</title>
            <link rel="stylesheet" href="/M-V-C/styles/styles.css">
        </head>
        <body>
        <main>
            <h1>Producten</h1>
            <div class="product-list">
                <?php foreach ($producten as $product): ?>
                    <div class="product-card">
                        <img src="<?= htmlspecialchars($product['foto']) ?>" alt="<?= htmlspecialchars($product['product']) ?>" style="max-width:150px;">
                        <h2><?= htmlspecialchars($product['product']) ?></h2>
                        <p><?= htmlspecialchars($product['omschrijving']) ?></p>
                        <p><strong>Prijs: €<?= htmlspecialchars($product['prijs']) ?></strong></p>
                        <form method="post" action="/M-V-C/controllers/add-to-cart.php">
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                            <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
        <?php require_once __DIR__ . '/footer.php'; ?>
        </body>
        </html>
        <?php
    }
}
?>