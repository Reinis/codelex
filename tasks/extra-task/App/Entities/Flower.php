<?php

namespace App\Entities;

class Flower
{
    private string $id;
    private string $name;
    private int $amount;

    public function __construct(string $id, string $name, int $amount)
    {
        $this->name = $name;
        $this->amount = $amount;
        $this->id = $id;
    }

    public function __toString(): string
    {
        return $this->getName();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function addAmount(int $amount): void
    {
        $this->amount += $amount;
    }

    public function subtractAmount(int $amount): void
    {
        $this->amount -= $amount;
    }

    public function getId(): string
    {
        return $this->id;
    }
}
