<?php

class Line
{
    private array $elements = [];

    public function __construct(array $elements = [])
    {
        foreach ($elements as $element)
        {
            $this->addElement($element);
        }
    }

    public function addElement(Element $element): void
    {
        $this->elements[] = $element;
    }

    public function getReward(): int
    {
        $firstElement = null;
        $equalElements = 1;

        foreach ($this->elements as $element)
        {
            if ($firstElement === null)
            {
                $firstElement = $element;
                continue;
            }

            if (! $firstElement->equals($element)) break;

            $equalElements++;
        }

        return $equalElements >= 3 ? $firstElement->reward() * $equalElements : 0;
    }
}