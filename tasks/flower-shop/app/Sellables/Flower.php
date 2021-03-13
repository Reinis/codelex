<?php

namespace App\Sellables;

class Flower implements Sellable
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
        return 'FLOWER_' . $this->name();
    }
}