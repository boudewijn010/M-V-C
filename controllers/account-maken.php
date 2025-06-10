<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../views/account-maken.php';
require_once __DIR__ . '/../models/account-maken.php';

class accountmakencontroller
{
    public static function execute()
    {
        accountmakenView::render();
    }
}

accountmakencontroller::execute();