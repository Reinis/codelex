<?php

namespace App\Suppliers;

use App\Product;
use App\ProductCollection;
use App\Sellables\Plant;
use App\Sellables\Tank;

class NBSSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection;

        $this->products->add(
            new Product(
                new Tank('Panzer', true), 100000
            ),
            3
        );

        $this->products->add(
            new Product(
                new Plant('Tulips Yellow'), 12
            ),
            250
        );
    }

    public function products(): ProductCollection
    {
        return $this->products;
    }
}