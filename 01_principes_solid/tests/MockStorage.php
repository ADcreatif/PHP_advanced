<?php


namespace Tests;

use ProBio\iStorage;

class MockStorage implements iStorage
{

    private $storage = [];

    public function __construct() {

        if(!array_key_exists('storage', $this->storage))
            $this->storage['storage'] = [];
    }

    public function setValue(string $name, int $price)
    {
        if(!array_key_exists($name, $this->storage)){
            $this->storage['storage'][$name] = 0;
        }

        $this->storage['storage'][$name] += $price;
    }

    public function getValue(string $name): int
    {
        // TODO: Implement getValue() method.
    }

    public function restore(string $name)
    {
        if(array_key_exists($name, $this->storage['storage']))
            unset($this->storage['storage'][$name]);
    }

    public function reset()
    {
        $this->storage['storage'] = [];
    }

    public function total(): int
    {
        return array_sum($this->storage['storage']);
    }
}