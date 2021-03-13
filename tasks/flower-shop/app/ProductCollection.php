<?php

namespace App;

class ProductCollection
{
    private array $products = [];

    public function add(Product $product, int $amount = 1)
    {
        $barCode = $product->barCode();

        if (isset($this->products[$barCode]))
        {
            $this->products[$barCode]['amount'] += $amount;
            return;
        }

        $this->products[$barCode] = [
            'product' => $product,
            'amount' => $amount
        ];
    }

    public function all(): array
    {
        return $this->products;
    }
}