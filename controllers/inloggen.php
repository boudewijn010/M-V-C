<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../models/inloggen.php';
require_once __DIR__ . '/../views/inloggen.php';

class inlogcontroller
{
    public static function execute()
    {
        $error = '';
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"] ?? '';
            $wachtwoord = $_POST["password"] ?? '';

            if (empty($email) || empty($wachtwoord)) {
                $error = "E-mail en wachtwoord zijn verplicht.";
            } else {
                $gebruiker = InloggenModel::checkLogin($email, $wachtwoord);
                if ($gebruiker) {
                    session_start();
                    $_SESSION["gebruiker_id"] = $gebruiker["id"];
                    header("Location: /M-V-C/views/welkom.php");
                    exit;
                } else {
                    $error = "Ongeldige e-mail of wachtwoord.";
                }
            }
        }
        inlogView::render($error);
    }
}

inlogcontroller::execute();