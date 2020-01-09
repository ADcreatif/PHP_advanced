<?php

namespace Tests;
use ProBio\{Product, Cart};

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    private $cart;

    protected function setUp(): void {
        $this->cart = new Cart(new MockStorage());
    }

    public function testInitProduct(){
        $this->assertInstanceOf(Product::class, new Product('apple', 1.5));
    }

    public function testAddProduct(){
        $this->assertEquals(0, $this->cart->total());
        $this->cart->buy(new Product('tomate', 100), 5);
        $this->assertGreaterThan(0, $this->cart->total());
    }

    public function testRestore(){
        $this->assertEquals(0, $this->cart->total());

        $tomate = new Product('tomate', 100);
        $this->cart->buy($tomate, 5);
        $this->cart->remove($tomate);

        $this->assertEquals(0, $this->cart->total());
    }

    public function testReset(){
        $this->assertEquals(0, $this->cart->total());

        $this->cart->buy(new Product('tomate', 100), 5);
        $this->cart->buy(new Product('melon', 300), 10);
        $this->cart->reset();

        $this->assertEquals(0, $this->cart->total());

    }


}
