<?php

require_once 'Sellable.php';
require_once 'Sellables/Flower.php';
require_once 'Sellables/Toy.php';
require_once 'Sellables/Tank.php';
require_once 'Sellables/Plant.php';
require_once 'Product.php';
require_once 'ProductCollection.php';
require_once 'Shop.php';
require_once 'Supplier.php';
require_once 'Suppliers/AmazingGardenSupplier.php';
require_once 'Suppliers/CoolGardenSupplier.php';
require_once 'Suppliers/WoopWoopSupplier.php';
require_once 'Suppliers/NBSSupplier.php';

$shop = new Shop();
$shop->addSupplier(new AmazingGardenSupplier);
$shop->addSupplier(new CoolGardenSupplier);
$shop->addSupplier(new WoopWoopSupplier);

$age = 21;

if ($age >= 18)
{
    $shop->addSupplier(new NBSSupplier);
}

foreach ($shop->products()->all() as ['product' => $product, 'amount' => $amount])
{
    echo $product->sellable()->name() . ' ' . $product->price() . ' ( ' . $amount . ' )' . PHP_EOL;
}