<?php

namespace App\Suppliers;

use App\Product;
use App\ProductCollection;
use App\Sellables\Flower;

class AmazingGardenSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection;

        $this->products->add(
            new Product(
                new Flower('Tulips Yellow'), 14
            ),
            300
        );

        $this->products->add(
            new Product(
                new Flower('Tulips Red'), 12
            ),
            600
        );
    }

    public function products(): ProductCollection
    {
        return $this->products;
    }
}