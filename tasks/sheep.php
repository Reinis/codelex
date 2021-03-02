<?php

$animals = ['sheep', 'sheep', 'sheep', 'wolf', 'sheep', 'wolf', 'sheep', 'sheep'];

// expected output: Happy, Happy, OMG, HEHE, OMG, HEHE, OMG, Happy
// isset

function isWolf(string $animal): bool
{
    return $animal === 'wolf';
}

for ($i = 0;$i < count($animals); $i++)
{
    if ($animals[$i] === 'wolf')
    {
        echo 'hehe' . PHP_EOL;
        continue;
    }

    if ((isset($animals[$i-1]) && isWolf($animals[$i-1])) || (isset($animals[$i+1]) && isWolf($animals[$i+1])))
    {
        echo 'OMG!' . PHP_EOL;
        continue;
    }

    echo 'Happy' . PHP_EOL;
}