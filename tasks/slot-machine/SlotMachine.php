<?php

class SlotMachine
{
    private const ROW_COUNT = 3;

    private array $elements;
    private array $slots = [];
    private array $lines = [];

    private int $columnCount;

    public function __construct(
        array $elements,
        int $columnCount = 3
    )
    {
        foreach ($elements as $element)
        {
            $this->addElement($element);
        }

        $this->columnCount = $columnCount;
    }

    public function roll(): void
    {
        for ($v = 0;$v < SlotMachine::ROW_COUNT; $v++)
        {
            $this->slots[$v] = [];

            for ($h = 0;$h < $this->columnCount; $h++)
            {
                $randomElement = $this->elements[array_rand($this->elements)];
                $this->slots[$v][$h] = $randomElement;
            }
        }

        $this->formLines();
    }

    private function formLines(): void
    {
        $this->registerBaseLines();
        $this->registerDiagonols();
    }

    private function registerBaseLines(): void
    {
        for ($v = 0;$v < SlotMachine::ROW_COUNT; $v++)
        {
            $this->lines[] = new Line($this->slots[$v]);
        }
    }

    private function registerDiagonols(): void
    {
        $ul = new Line();
        $rowNr = -1;
        for ($c = 0;$c < $this->columnCount; $c++)
        {
            $direction = intdiv($c, SlotMachine::ROW_COUNT) % 2 === 0 ? -1 : 1;
            $rowNr -= $direction;
            $ul->addElement($this->slots[$rowNr][$c]);
        }
        $this->lines[] = $ul;
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