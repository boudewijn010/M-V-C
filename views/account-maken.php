<link rel="stylesheet" href="inloggen.css">

<div class="container">
    <div class="heading"> Sign up</div>
    <form action="" method="post" class="form">
        <input required class="input" type="email" name="email" id="email" placeholder="E-mail">
        <input required class="input" type="password" name="password" id="password" placeholder="Password">
        <input class="login-button" type="submit" value="Sign up">
        <div class="register-link">
            <a class="maken" href="inloggen.php">Al een account? Log in!</a>
            <?php if (!empty($error)): ?>
                <div style="color:red; text-align:center; margin-top:10px;"><?= htmlspecialchars($error) ?></div>
            <?php endif; ?>
    </form>
</div>