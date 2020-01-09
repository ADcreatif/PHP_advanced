<?php

namespace ProBio;

class Cart implements Observer
{

    private $storage;
    private $tva;

    public function __construct(iStorage $storage, int $tva = 20){
        $this->tva = $tva;
        $this->storage = $storage;

    }

    public function buy(Product $product, $quantity = 1): void{
        $priceHT = abs($quantity) * $product->price;
        $priceTTC = $priceHT + $priceHT * ($this->tva/100);

        $this->storage->setValue($product->name, $priceTTC);
    }

    public function remove(Product $product){
        $this->storage->restore($product->name);
    }

    public function reset(){
        $this->storage->reset();
    }

    public function total(): int{
        return $this->storage->total();
    }

    public function update(string $name)
    {
        $flashBag = new FlashBag();
        $total =  number_format($this->total()/100, 2);
        $flashBag->addMessage(" Le produit $name a bien été ajouté au panier<br> total du panier : $total €");
    }
}