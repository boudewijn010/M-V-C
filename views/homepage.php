<?php
class HomepageView
{
    public static function render()
    {
        echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
    <link rel="stylesheet" type="text/css" href="/views/styles.css">
</head>
<body>
    <?php require_once __DIR__ . '/../views/header.php'; ?>
    <main>
        <h1>Welkom op de homepage!</h1>
        <p>Dit is de startpagina van je webshop.</p>
    </main>
</body>
</html>
HTML;
    }
}

HomepageView::render();
?>