<?php

namespace khoul\Sales\Factory;

use khoul\Sales\Product;

abstract class ProductFactory
{
    public static function create(array $productData): Product
    {
        return new Product(
            sku: $productData['sku'],
            name: $productData['name'],
            price: $productData['price'],
        );
    }
}