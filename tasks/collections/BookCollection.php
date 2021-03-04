<?php

class BookCollection
{
    private array $books = [];

    public function add(int $book): void
    {
        $this->books[] = $book;
    }

    public function all(): array
    {
        return $this->books;
    }

    public function removeAt(int $index): void
    {
        if (! isset($this->books[$index]))
        {
            throw new OutOfRangeException('Book at index ' . $index . ' not found.');
        }

        unset($this->books[$index]);
    }
}