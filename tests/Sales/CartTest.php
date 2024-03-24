<?php

declare(strict_types=1);

namespace khoul\Tests\Sales;

use khoul\Sales\CartItem;
use khoul\Sales\Product;
use PHPUnit\Framework\TestCase;
use khoul\Sales\Cart;

final class CartTest extends TestCase
{
    private Cart $cart;
    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->cart = new Cart();
    }

    public function test_can_create_a_new_cart() : void
    {
        $this->assertInstanceOf(Cart::class, $this->cart);
    }

    public function test_cart_must_be_unique() : void
    {
        $secondCart = new Cart();
        $this->assertNotEquals($this->cart->getId(), $secondCart->getId());
    }

    public function test_new_cart_must_be_empty_by_default(): void
    {
        $this->assertCount(0, $this->cart->getItems());
    }

    public function test_add_one_product_into_cart(): void{
        $this->cart->addItem(new CartItem(new Product('ABCDEF', 'T-shirt', 10.99), 1));
        $this->assertCount(1, $this->cart->getItems());

        $item = $this->cart->getItem('ABCDEF');
        $this->assertEquals('ABCDEF', $item->getProduct()->getSku());
        $this->assertEquals(1, $item->getOrderedQuantity());
    }
}