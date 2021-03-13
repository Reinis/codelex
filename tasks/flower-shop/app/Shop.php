<?php

namespace App;

use App\Suppliers\Supplier;

class Shop
{
    private array $suppliers = [];

    public function addSupplier(Supplier $supplier): void
    {
        $this->suppliers[] = $supplier;
    }

    public function products(): ProductCollection
    {
        $products = new ProductCollection();

        foreach ($this->suppliers as $supplier)
        {
            $supplierProducts = $supplier->products()->all();

            foreach ($supplierProducts as $barCode => ['product' => $product, 'amount' => $amount])
            {
                $products->add(
                    new Product(
                        $product->sellable(),
                        $product->price() + ($product->price() * 0.2)
                    ),
                    $amount
                );
            }
        }

        return $products;
    }
}