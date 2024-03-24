<?php
declare(strict_types=1);
namespace khoul\Sales;

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
        $this->items[$item->getProduct()->getSku()] = $item;

        return $this;
    }

    public function getItem(string $sku): ?CartItem
    {
        return $this->items[$sku];
    }
}