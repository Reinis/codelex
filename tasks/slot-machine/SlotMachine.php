<?php

class SlotMachine
{
    private array $elements;
    private array $slots = [];
    private array $lines = [];

    private int $verticalSlotsCount;
    private int $horizontalSlotsCount;

    public function __construct(
        array $elements,
        int $verticalSlotsCount = 3,
        int $horizontalSlotsCount = 3
    )
    {
        foreach ($elements as $element)
        {
            $this->addElement($element);
        }

        $this->verticalSlotsCount = $verticalSlotsCount;
        $this->horizontalSlotsCount = $horizontalSlotsCount;
    }

    public function roll(): void
    {
        for ($v = 0;$v < $this->verticalSlotsCount; $v++)
        {
            $this->slots[$v] = [];

            for ($h = 0;$h < $this->horizontalSlotsCount; $h++)
            {
                $randomElement = $this->elements[array_rand($this->elements)];
                $this->slots[$v][$h] = $randomElement;
            }
        }

        $this->formLines();
    }

    private function formLines(): void
    {
        for ($v = 0;$v < $this->verticalSlotsCount; $v++)
        {
            $this->lines[] = new Line($this->slots[$v]);
        }

        // Logic to add diagonals
    }

    public function getReward(): int
    {
        $reward = 0;

        foreach ($this->lines as $line)
        {
            $reward += $line->getReward();
        }

        return $reward;
    }

    public function slots(): array
    {
        return $this->slots;
    }

    private function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }
}