<?php

namespace App\Entities\Collections;

use App\Entities\Flower;
use ArrayIterator;
use IteratorAggregate;

class Flowers implements IteratorAggregate, \Countable
{
    /**
     * @var Flower[]
     */
    private array $flowers = [];

    public function __construct(Flower ...$flowers)
    {
        if ($flowers !== null) {
            foreach ($flowers as $flower) {
                $this->flowers[$flower->getId()] = $flower;
            }
        }
    }

    public function addFlower(Flower $flower): void
    {
        $id = $flower->getId();

        if (!isset($this->flowers[$id])) {
            $this->flowers[$id] = $flower;
        } else {
            $this->flowers[$id]->addAmount($flower->getAmount());
        }
    }

    /**
     * @return ArrayIterator|Flower[]
     */
    public function getIterator(): ArrayIterator
    {
        return new ArrayIterator($this->flowers);
    }

    public function count(): int
    {
        return count($this->flowers);
    }
}
