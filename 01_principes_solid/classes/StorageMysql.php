<?php


namespace ProBio;


class StorageMysql implements iStorage
{

    use Observable;

    protected $observer;
    protected $pdo = null;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getValue(string $name): int
    {
        $sql = "SELECT price FROM product WHERE name=?";
        $request = $this->pdo->prepare($sql);
        $request->execute([$name]);
        return $request->fetchColumn();
    }

    public function setValue(string $name, int $price)
    {
        $sql = "UPDATE product SET total = total + ? WHERE name= ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$price, $name]);

        $this->notify($name);
    }

    public function restore(string $name)
    {
        // remet la quantité des produits à zero
        $sql = "UPDATE product SET total = 0 WHERE name = ?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$name]);
    }

    public function reset()
    {
        // remet la totalité du panier à 0;
        $query = $this->pdo->prepare("UPDATE product set total = 0");
        $query->execute();
    }

    public function total() :int
    {
        $sql = "SELECT SUM(total) as total FROM product";
        $query = $this->pdo->prepare($sql);
        $query->execute();
        return $query->fetchColumn();
    }

    function subscribe(Observer $observer)
    {
        $this->observer = $observer;
    }

    function unsubscribe(Observer $observer)
    {
        $this->observer = null;
    }

    function notify(string $name)
    {
        $this->observer->update($name);
    }
}