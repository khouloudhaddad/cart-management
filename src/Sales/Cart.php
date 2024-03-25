<?php
declare(strict_types=1);
namespace khoul\Sales;

use khoul\Sales\Exception\NotAllowedQuantityException;
use khoul\Sales\Exception\ProductNotFoundException;

final class Cart
{
    private string $id;
    private array $items;

    public function __construct()
    {
        $this->id = sha1(uniqid('', true));
        $this->items = [];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function addItem(CartItem $item): self
    {
        $orderedQuantity = $item->getOrderedQuantity();
        if($orderedQuantity <= 0){
            throw new NotAllowedQuantityException($orderedQuantity);
        }

        $productSku = $item->getProduct()->getSku();
        $existingItem = $this->getItem($productSku);

        if($existingItem !== null){
            $existingItem->incrementOrderedQuantity($orderedQuantity);
        } else {
            $this->items[$productSku] = $item;
        }

        return $this;
    }

    public function getItem(string $sku): ?CartItem
    {
        return $this->items[$sku];
    }

    public function removeItem(string $productSku, ?int $quantityToRemove = null ): self
    {
        $item = $this->getItem($productSku);
        if($item === null){
            throw new ProductNotFoundException($productSku);
        }

        if($quantityToRemove === null){
            unset($this->items[$productSku]);
        }else{
            $item->decrementOrderedQuantity($quantityToRemove);
            if($item->getOrderedQuantity() === 0){
                unset($this->items[$productSku]);
            }
        }

        return $this;
    }
}