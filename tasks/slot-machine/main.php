<?php

// Player
// SlotMachine
// Line
// Element

require_once 'Player.php';
require_once 'Element.php';
require_once 'Line.php';
require_once 'SlotMachine.php';

$player = new Player;
$player->setMoney(2000);
$player->setBet(10);

$machine = new SlotMachine([
    new Element('A', 10),
    new Element('K', 8),
    new Element('Q', 7),
    new Element('J', 5),
    new Element('X', 20),
], 5);

$machine->roll();

foreach ($machine->slots() as $slot)
{
    foreach ($slot as $element)
    {
        echo (string) $element . ' ';
    }

    echo PHP_EOL;
}

echo $machine->getReward();