<?php

interface Supplier
{
    public function products(): ProductCollection;
}