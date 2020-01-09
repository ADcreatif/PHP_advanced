<?php


include "config.php";

$products = getProducts();

/*
    use ProBio\{Cart,Connect, StorageMysql};
    $shop = new Cart( new StorageMysql( Connect::getPDO() ));
    $shop = new Cart( new StorageMysql( Connect::getPDO() ));
    $shop = new Cart( new StorageSession('Youpiiiii')  );
    $shop->buy($tomate, 10);
    $shop->buy($oignon, 10);
    $shop->buy($salade, 10);
    echo "total panier : " . $shop->total() / 100 ." €";
    $shop->remove($oignon);
    $shop->reset();
*/


include "index.phtml";

