<?php

namespace App\Controllers;

class HomeController
{
    public function index(): void
    {
        echo "Hello from HomeController";

        require_once __DIR__ . '/../Views/home.php';
    }
}
