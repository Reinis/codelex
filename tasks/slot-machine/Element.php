<?php

class Element
{
    private string $symbol;
    private int $reward;

    public function __construct(string $symbol, int $reward)
    {
        $this->symbol = $symbol;
        $this->reward = $reward;
    }

    public function symbol(): string
    {
        return $this->symbol;
    }

    public function reward(): int
    {
        return $this->reward;
    }

    public function __toString(): string
    {
        return $this->symbol();
    }

    public function equals(Element $element): bool
    {
        return (string) $element === $this->symbol();
    }
}