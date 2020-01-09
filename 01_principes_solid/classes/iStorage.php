<?php


namespace ProBio;


interface iStorage
{
    public function setValue(string $name, int $price);
    public function getValue(string $name): int;
    public function restore(string $name);
    public function reset();
    public function total() :int;
}