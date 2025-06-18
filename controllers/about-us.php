<?php
include_once __DIR__ . '/../views/about-us.php';

class aboutusController
{
    public static function execute()
    {

        aboutusView::render();
    }
}

aboutusController::execute();

?>