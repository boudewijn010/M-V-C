<?php
require_once __DIR__ . '/../views/shop.php';
class ShopController
{
    public static function execute()
    {
        ShopView::render();
    }
}