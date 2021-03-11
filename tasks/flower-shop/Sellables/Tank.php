<?php

class Tank implements Sellable
{
    private string $name;
    private bool $isCool;

    public function __construct(string $name, bool $isCool)
    {
        $this->name = $name;
        $this->isCool = $isCool;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function id(): string
    {
        return 'TANK_' . $this->name();
    }
}