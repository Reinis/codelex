<?php


namespace App\Controllers;


class ShopController
{
    public function index(): void
    {
        echo 'ShopController::index';

        require_once __DIR__ . '/../Views/shop.php';
    }
}
