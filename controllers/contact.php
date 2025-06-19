<?php
include_once __DIR__ . '/../views/contact.php';

class contactController
{
    public static function execute()
    {

        contactView::render();
    }
}

contactController::execute();

?>