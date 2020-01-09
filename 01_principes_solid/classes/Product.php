<?php


namespace ProBio;


class Product
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var int
     */
    private $price;

    /**
     * Product constructor.
     * @param string $name
     * @param int $price
     */
    public function __construct(string $name, int $price) {
        $this->name = $name;
        $this->price = $price;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * Cette méthode magique me permet d'accéder aux getters et setters en faisant
     * $product->name à la place de $product->getName()
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        $method = "get". ucfirst($name);
        if(method_exists($this, $method)) {
            return $this->$method();
        }
    }
    /**
     * @param $name
     * @param $value
     * @return mixed
     */
    public function __set($name, $value)
    {
        $method = "set". ucfirst($name);

        if(method_exists($this, $method)) {
            return $this->$method($value);
        }
    }


}
