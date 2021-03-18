<?php

namespace App\Suppliers;

use App\Product;
use App\ProductCollection;
use App\Sellables\Item;
use Medoo\Medoo;

class CoolGardenSupplier implements Supplier
{
    private ProductCollection $products;

    public function __construct()
    {
        $this->products = new ProductCollection;

        $database = new Medoo([
            'database_type' => 'mysql',
            'database_name' => 'codelex',
            'server' => 'localhost',
            'username' => 'root',
            'password' => ''
        ]);

        $productsInfo = $database->select('products', '*');

        foreach ($productsInfo as $productInfo)
        {
            $this->products->add(
                new Product(
                    new Item(
                        (int) $productInfo['id'],
                        $productInfo['name']
                    ),
                    (int) $productInfo['price']
                ),
                (int) $productInfo['amount']
            );
        }
    }

    public function products(): ProductCollection
    {
        return $this->products;
    }
}