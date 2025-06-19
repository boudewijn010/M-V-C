<?php
class contactView
{
    public static function render($error = '')
    {
        ?>
        <!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <title>Contact</title>
            <link rel="stylesheet" type="text/css" href="/M-V-C/styles/styles.css">
        </head>
        <body>
        <?php require_once __DIR__ . '/header.php'; ?>
        <main style="max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07);">
            <h1>Contact</h1>
            <p>Neem contact met ons op via onderstaand formulier.</p>
            <form class="contact-form" method="post" action="">
                <input type="text" name="naam" placeholder="Uw naam" required><br>
                <input type="email" name="email" placeholder="Uw e-mail" required><br>
                <textarea name="bericht" placeholder="Uw bericht" required></textarea><br>
                <button type="submit">Verstuur</button>
            </form>
        </main>
        <?php require_once __DIR__ . '/footer.php'; ?>
        </body>
        </html>
        <?php
    }
}
?>