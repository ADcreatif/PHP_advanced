<?php


namespace ProBio;


class StorageSession implements iStorage
{

    /**
     * @var string
     */
    private $sessID;

    public function __construct(string $sessID = "cart")
    {
        if(session_status() == PHP_SESSION_NONE){
            session_start();
        }

        $this->sessID = $sessID;

        // si la sessID  n'existe pas encore, on va créer un nouveau panier
        if(!array_key_exists($this->sessID, $_SESSION)){
            $_SESSION[$this->sessID] = [];
        }

    }

    public function setValue(string $name, int $price)
    {
        if(!array_key_exists($name, $_SESSION[$this->sessID])){
            $_SESSION[$this->sessID][$name] = 0;
        }

        $_SESSION[$this->sessID][$name] += $price;
    }

    public function getValue(string $name): int
    {
        return array_key_exists($name, $_SESSION[$this->sessID]) ? $_SESSION[$this->sessID][$name] : 0;
    }

    public function restore(string $name)
    {
        if(array_key_exists($name, $_SESSION[$this->sessID])){
            unset($_SESSION[$this->sessID][$name]);
        }
    }

    public function reset(){
        $_SESSION[$this->sessID] = [];
    }

    public function total() :int{
        return array_sum($_SESSION[$this->sessID]);
    }

}