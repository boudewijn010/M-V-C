<?php
    require_once __DIR__ . '/../models/contact.php';
    require_once __DIR__ . '/../views/contact.php';

    $error = '';
    $success = false;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $naam = $_POST['naam'] ?? '';
        $email = $_POST['email'] ?? '';
        $bericht = $_POST['bericht'] ?? '';

        if ($naam && $email && $bericht) {
            if (ContactModel::save($naam, $email, $bericht)) {
                $success = true;
            } else {
                $error = 'Saving failed. Try again.';
            }
        } else {
            $error = 'All fields are required.';
        }
    }

    ContactView::render($error, $success);