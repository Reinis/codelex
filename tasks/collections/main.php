<?php

require_once 'Book.php';
require_once 'BookCollection.php';

$books = new BookCollection();
$books->add(1);

try {
    $books->removeAt(1);
} catch (OutOfRangeException $exception) {

}

var_dump($books);
