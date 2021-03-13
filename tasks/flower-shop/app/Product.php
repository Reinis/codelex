<?php

namespace App;

use App\Sellables\Sellable;

class Product
{
    private Sellable $sellable;
    private int $price;

    public function __construct(Sellable $sellable, int $price)
    {
        $this->sellable = $sellable;
        $this->price = $price;
    }

    public function sellable(): Sellable
    {
        return $this->sellable;
    }

    public function price(): int
    {
        return $this->price;
    }

    public function barCode(): string
    {
        return md5($this->sellable->id());
    }
}