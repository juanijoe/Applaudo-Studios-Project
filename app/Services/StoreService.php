<?php

namespace App\Services;

use App\Models\Product;

class StoreService
{
    public function save($products)
    {
        foreach ($products as $product) {
            dd(var_dump($product));
            $product->validate(Product::$rules);
            $items[] = Product::create($product->all());
        }
        return $items;
    }
}
