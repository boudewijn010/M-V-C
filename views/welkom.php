<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <title>Welkom</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            text-align: center;
            padding-top: 100px;
        }

        .container {
            background: #fff;
            padding: 40px;
            border-radius: 8px;
            display: inline-block;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    require_once("header.php");
    ?>

    <div class="container">
        <h1>Welkom!</h1>
        <p>Je bent succesvol ingelogd.</p>
        <a href="logout.php">Uitloggen</a>
    </div>
</body>

</html>