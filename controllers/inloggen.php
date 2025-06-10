<?php
require_once __DIR__ . '/../models/DBconnection.php';
require_once __DIR__ . '/../views/inloggen.php';
require_once __DIR__ . '/../models/inloggen.php';

class inlogcontroller
{
    public static function execute()
    {
        inlogView::render();
    }
}

inlogcontroller::execute();