<?php

namespace App\Suppliers;

use App\Product;
use App\ProductCollection;
use App\Sellables\Flower;

class CoolGardenSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection;

        $this->products->add(
            new Product(
                new Flower('Tulips Yellow'), 10
            ),
            200
        );

        $this->products->add(
            new Product(
                new Flower('Tulips Red'), 12
            ),
            300
        );
    }

    public function products(): ProductCollection
    {
        return $this->products;
    }
}