<?php
class inlogView
{
    public static function render($error = '')
    {
        ?>

        <head>
            <link rel="stylesheet" href="/M-V-C-1/styles/inloggen.css">
        </head>
        <div class="container">
            <div class="heading">Sign In</div>
            <form action="" method="post" class="form">
                <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
                <input required class="input" type="password" name="password" id="password" placeholder="Password">
                <input class="login-button" type="submit" value="Sign In">
                <div class="register-link">
                    <a class="maken" href="account-maken.php">Nog geen account? Maak er een aan!</a>
                </div>
                <?php if (!empty($error)): ?>
                    <div style="color:red; text-align:center; margin-top:10px;"><?= htmlspecialchars($error) ?></div>
                <?php endif; ?>
            </form>
        </div>
        <?php
    }
}