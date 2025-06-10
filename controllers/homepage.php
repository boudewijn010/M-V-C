<?php
include_once __DIR__ . '/../views/homepage.php';

class HomepageController
{
    public static function execute()
    {

        HomepageView::render();
    }
}

HomepageController::execute();

?>