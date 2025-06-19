<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../models/account-maken.php';

class accountmakenView
{
    public static function render($error = '')
    {
        ?>
        <!DOCTYPE html>
        <html lang="nl">
        <head>
            <meta charset="UTF-8">
            <title>Account aanmaken</title>
            <link rel="stylesheet" href="/M-V-C/styles/inloggen.css">
        </head>
        <body>
        <div style="position: absolute; top: 24px; left: 24px; z-index: 10;">
            <button type="button"
                    onclick="window.history.back()"
                    style="background: #111; color: #fff; border: none; border-radius: 20px; padding: 8px 22px; cursor: pointer; font-weight: 600;">
                &#8592; Back
            </button>
        </div>
        <div class="container">
            <div class="heading">Account aanmaken</div>
            <form action="" method="post" class="form">
                <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
                <input required class="input" type="password" name="password" id="password" placeholder="Wachtwoord">
                <input required class="input" type="password" name="password2" id="password2" placeholder="Herhaal wachtwoord">
                <input class="login-button" type="submit" value="Sign up">
                <div class="register-link">
                    <a class="maken" href="inloggen.php">Al een account? Log in!</a>
                </div>
                <?php if (!empty($error)): ?>
                    <div style="color:red; text-align:center; margin-top:10px;"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
            </form>
        </div>
        </body>
        </html>
        <?php
    }
}