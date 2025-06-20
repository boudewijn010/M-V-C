<?php
require_once __DIR__ . '/../views/cart.php';

class CartController
{
    public static function execute()
    {
        CartView::render();
    }
}

CartController::execute();