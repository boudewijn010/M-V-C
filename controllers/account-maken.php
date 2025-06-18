<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../views/account-maken.php';
require_once __DIR__ . '/../models/account-maken.php';

class accountmakencontroller
{
    public static function execute()
    {
        $error = '';
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $email = $_POST["email"] ?? '';
            $password = $_POST["password"] ?? '';
            $password2 = $_POST["password2"] ?? '';

            $error = AccountModel::register($email, $password, $password2);

            if ($error === "") {
                header("Location: inloggen.php");
                exit;
            }
        }
        accountmakenView::render($error);
    }
}

accountmakencontroller::execute();