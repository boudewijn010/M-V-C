<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../models/contact.php';
require_once __DIR__ . '/../views/contact.php';

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'] ?? '';
    $email = $_POST['email'] ?? '';
    $bericht = $_POST['bericht'] ?? '';

    if ($naam && $email && $bericht) {
        $db = (new DBConnection())->connect();
        $contactModel = new Contact($db);
        if ($contactModel->saveContact($naam, $email, $bericht)) {
            $success = true;
        } else {
            $error = 'Saving failed. Try again.';
        }
    } else {
        $error = 'All fields are required.';
    }
}

contactView::render($error, $success);