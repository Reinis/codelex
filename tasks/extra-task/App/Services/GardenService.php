<?php

namespace App\Services;

use App\Entities\Collections\Flowers;

class GardenService
{
    private DataServiceInterface $dataService;

    public function __construct(DataServiceInterface $dataService)
    {
        $this->dataService = $dataService;
    }

    public function getAllFlowers(): Flowers
    {
        return $this->dataService->getAllFlowers();
    }
}