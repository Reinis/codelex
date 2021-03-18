<?php

namespace App\Controllers;

use App\Services\CsvService;
use App\Services\GardenService;

class GardenController
{

    private GardenService $service;
    private string $csvFileName = 'super-garden.csv';

    public function __construct()
    {
        $this->service = new GardenService(new CsvService($this->csvFileName));
    }

    public function index(): void
    {
        echo "Hello from GardenController";

        $flowers = $this->service->getAllFlowers();
        $number = count($flowers);

        require_once __DIR__ . '/../Views/garden.php';
    }
}
