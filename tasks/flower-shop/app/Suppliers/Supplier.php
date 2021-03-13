<?php

namespace App\Suppliers;

use App\ProductCollection;

interface Supplier
{
    public function products(): ProductCollection;
}