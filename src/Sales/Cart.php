<?php
declare(strict_types=1);
namespace khoul\Sales;

use PhpParser\Node\Expr\Array_;

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

    public function addItem(string $sku, string $name, $price, $quantity): self
    {
        $this->items[$sku] = [
            'sku' => $sku,
            'name' => $name,
            'price' => $price,
            'ordered_quantity' => $quantity
        ];

        return $this;
    }

    public function getItem(string $sku): ?array
    {
        return $this->items[$sku];
    }
}