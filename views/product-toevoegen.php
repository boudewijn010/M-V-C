<?php
class ProductToevoegenView
{
    public static function render($error = '', $success = false)
    {
        ?>
        <!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <title>Product toevoegen</title>
            <link rel="stylesheet" href="/M-V-C/styles/styles.css">
        </head>
        <body>
        <main>
            <h1>Product toevoegen</h1>
            <?php if ($success): ?>
                <p style="color:green;">Product succesvol toegevoegd!</p>
            <?php elseif ($error): ?>
                <p style="color:red;"><?= htmlspecialchars($error) ?></p>
            <?php endif; ?>
            <form method="post" enctype="multipart/form-data" class="contact-form">
                <input type="text" name="product" placeholder="Productnaam" required>
                <input type="number" step="0.01" name="prijs" placeholder="Prijs" required>
                <textarea name="omschrijving" placeholder="Omschrijving" required></textarea>
                <input type="file" name="foto" accept="image/*" required>
                <button type="submit">Toevoegen</button>
            </form>
        </main>
        </body>
        </html>
        <?php
    }
}