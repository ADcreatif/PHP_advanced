<?php
include "vendor/autoload.php";

define ( '_ROOT_', 'http://' . $_SERVER['SERVER_NAME'] . preg_replace('/[\w.]+$/i','',$_SERVER['SCRIPT_NAME'] ));

use ProBio\{Product, Connect, FlashBag};

Connect::set([
    'dsn'       => 'mysql:dbname=probio;host=localhost;charset=utf8',
    'username'  => 'root',
    'password'  => ''
]);

$flashBag  = new FlashBag();

function getProducts(): array{
    $products = [];
    foreach(Connect::getPDO()->query("SELECT * FROM product") as $product){
        $products[$product->name] = new Product($product->name, $product->price);
    }
    return $products;
};

/*
 * $products = [
 *  'tomate' => new Product('tomate', 500),
 *  'fraise' => new Product('fraise', 300)
 * ];
 */
