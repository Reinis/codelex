<?php

use App\Services\CsvService;
use App\Services\GardenService;

require_once 'vendor/autoload.php';


$csvFileName = 'super-garden.csv';

$dataService = new CsvService($csvFileName);
$service = new GardenService($dataService);
$flowers = $service->getAllFlowers();

echo "$csvFileName:\n";

foreach ($flowers as $flower) {
    printf("%-20s %-20s %4d\n", $flower->getId(), $flower->getName(), $flower->getAmount());
}
