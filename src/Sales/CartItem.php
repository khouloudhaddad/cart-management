<?php

namespace khoul\Sales;

class CartItem
{
    public function __construct(
        private Product $product,
        private int $orderedQuantity
    )
    {}

    public function getProduct(): Product
    {
        return $this->product;
    }

    public function getOrderedQuantity(): int
    {
        return $this->orderedQuantity;
    }


}