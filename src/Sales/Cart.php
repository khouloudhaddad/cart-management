<?php
declare(strict_types=1);
namespace khoul\Sales;

use khoul\Sales\Exception\NotAllowedQuantityException;

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
}