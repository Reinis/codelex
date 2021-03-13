<?php

namespace App\Suppliers;

use App\Product;
use App\ProductCollection;
use App\Sellables\Flower;
use App\Sellables\Toy;

class WoopWoopSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection;

        $this->products->add(
            new Product(
                new Flower('Tulips Yellow'), 10
            ),
            100
        );

        $this->products->add(
            new Product(
                new Flower('Tulips Red'), 10
            ),
            100
        );

        $this->products->add(
            new Product(
                new Toy('Lācis', 30), 200
            ),
            5
        );
    }

    public function products(): ProductCollection
    {
        return $this->products;
    }
}