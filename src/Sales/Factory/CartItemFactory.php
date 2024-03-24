<?php

namespace khoul\Sales\Factory;

use khoul\Sales\CartItem;

abstract class CartItemFactory
{
    static function create(array $itemData): CartItem
    {
        return new CartItem(
            product: ProductFactory::create($itemData['product']),
            orderedQuantity: $itemData['ordered_quantity']
        );
    }
}