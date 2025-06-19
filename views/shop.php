<?php
class ShopView
{
    public static function render()
    {
        require_once __DIR__ . '/header.php';
        ?>
        <!DOCTYPE html>
        <html lang="nl">

        <head>
            <meta charset="UTF-8">
            <title>Shop</title>
            <link rel="stylesheet" href="/M-V-C-1/styles/styles.css">
        </head>

        <body>
            <main>
                <h1>Welkom in de Shop</h1>
                <p>Hier komen je producten te staan.</p>
            </main>
            <?php require_once __DIR__ . '/footer.php'; ?>
        </body>

        </html>
        <?php
    }
}
?>