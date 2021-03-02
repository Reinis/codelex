<?php

class Player
{
    private int $money = 0;
    private int $bet = 0;

    public function money(): int
    {
        return $this->money;
    }

    public function bet(): int
    {
        return $this->bet;
    }

    public function setMoney(int $amount): void
    {
        if ($amount < 0) return;

        $this->money = $amount;
    }

    public function setBet(int $bet): void
    {
        if ($bet % 10 !== 0 || $bet > $this->money || $bet < 0) return;

        $this->bet = $bet;
    }
}