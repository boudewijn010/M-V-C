<?php
require_once __DIR__ . '/../models/product.php';
require_once __DIR__ . '/../views/product-toevoegen.php';

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product = $_POST['product'] ?? '';
    $prijs = $_POST['prijs'] ?? '';
    $omschrijving = $_POST['omschrijving'] ?? '';

    // Handle file upload
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }
        $fileName = uniqid() . '_' . basename($_FILES['foto']['name']);
        $uploadFile = $uploadDir . $fileName;
        $filePathForDb = '/M-V-C/uploads/' . $fileName;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $uploadFile)) {
            if ($product && $prijs && $omschrijving) {
                if (ProductModel::add($product, $prijs, $omschrijving, $filePathForDb)) {
                    $success = true;
                } else {
                    $error = 'Fout bij toevoegen.';
                }
            } else {
                $error = 'Alle velden zijn verplicht.';
            }
        } else {
            $error = 'Fout bij uploaden van de foto.';
        }
    } else {
        $error = 'Foto is verplicht.';
    }
}

ProductToevoegenView::render($error, $success);