<?php
require_once("../models/DBconnection.php");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $naam = $_POST["naam"] ?? '';
    $omschrijving = $_POST["omschrijving"] ?? '';
    $prijs = $_POST["prijs"] ?? '';

    if (empty($naam) || empty($omschrijving) || empty($prijs)) {
        $error = "Alle velden zijn verplicht.";
    } elseif (!is_numeric($prijs) || $prijs <= 0) {
        $error = "Voer een geldige prijs in.";
    } else {
        $db = new DBConnection();
        $conn = $db->connect();

        $stmt = $conn->prepare("INSERT INTO producten (naam, omschrijving, prijs) VALUES (:naam, :omschrijving, :prijs)");
        $stmt->bindParam(":naam", $naam);
        $stmt->bindParam(":omschrijving", $omschrijving);
        $stmt->bindParam(":prijs", $prijs);

        if ($stmt->execute()) {
            $success = "Product succesvol toegevoegd!";
        } else {
            $error = "Er is iets misgegaan. Probeer opnieuw.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Product toevoegen</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <?php require_once("header.php"); ?>
    <main
        style="max-width: 500px; margin: 40px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 2px 12px rgba(0,0,0,0.07);">
        <h1>Product toevoegen</h1>
        <?php if (!empty($error)): ?>
            <div style="color:red; text-align:center; margin-bottom:10px;"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div style="color:green; text-align:center; margin-bottom:10px;"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>
        <form action="" method="post" class="form">
            <label for="naam">Naam:</label>
            <input required class="input" type="text" id="naam" name="naam" placeholder="Productnaam">

            <label for="omschrijving">Omschrijving:</label>
            <textarea required class="input" id="omschrijving" name="omschrijving" rows="3"
                placeholder="Productomschrijving"></textarea>

            <label for="prijs">Prijs (&euro;):</label>
            <input required class="input" type="number" step="0.01" min="0" id="prijs" name="prijs" placeholder="Prijs">

            <input class="login-button" type="submit" value="Toevoegen">
        </form>
    </main>
    <?php require_once("footer.php"); ?>
</body>

</html>