<?php
include_once __DIR__ . '/../models/sales.php';
include_once __DIR__ . '/../views/homepage.php';

class HomepageController
{
    private $shopModel;

    public function __construct()
    {
        $this->shopModel = new Shop();
    }

    public function index()
    {
        $products = $this->shopModel->getAllProducts();
        include __DIR__ . '/../views/homepage.php';
    }
}

?>