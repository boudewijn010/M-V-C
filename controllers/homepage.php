<?php
// include_once __DIR__ . '/../models/sales.php';
include_once __DIR__ . '/../views/homepage.php';
// include_once __DIR__ . '/../views/header.php';

class HomepageController
{
    public static function execute()
    {
        echo "tezt";
        HomepageView::render();
    }
}

HomepageController::execute();

?>