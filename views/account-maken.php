<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../models/account-maken.php';

class accountmakenView
{
    public static function render($error = '')
    {
        ?>
        <link rel="stylesheet" href="/M-V-C/styles/inloggen.css">
        <div class="container">
            <div class="heading">Sign up</div>
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
        <?php
    }
}