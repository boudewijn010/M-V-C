<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Contact | Shoporia</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php require_once("header.php"); ?>
    <main
        style="max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07);">
        <h1>Contact</h1>
        <form action="" method="post" class="form">
            <label for="naam">Naam:</label>
            <input required class="input" type="text" id="naam" name="naam" placeholder="Uw naam">

            <label for="email">E-mail:</label>
            <input required class="input" type="email" id="email" name="email" placeholder="Uw e-mailadres">

            <label for="bericht">Bericht:</label>
            <textarea required class="input" id="bericht" name="bericht" rows="5" placeholder="Uw bericht"></textarea>

            <input class="login-button" type="submit" value="Verstuur">
        </form>
    </main>
    <?php require_once("footer.php"); ?>
</body>

</html>