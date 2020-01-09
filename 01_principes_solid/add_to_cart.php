<?php
include "config.php";

use ProBio\{StorageMysql,Cart, Connect};

if(array_key_exists('name', $_GET)){
    $products = getProducts();

    $storageMysql = new StorageMysql(Connect::getPDO());
    $cart = new Cart($storageMysql);
    $storageMysql->subscribe($cart);

    $cart->buy($products[$_GET['name']]);

}

header("Location: "._ROOT_);