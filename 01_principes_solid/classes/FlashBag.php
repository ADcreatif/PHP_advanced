<?php


namespace ProBio;

class FlashBag
{

    private $storageKey;

    public function __construct($storage_key = 'message') {
        if(session_status() != PHP_SESSION_ACTIVE){
            session_start();
        }

        $this->storageKey = $storage_key;

        if(!array_key_exists($this->storageKey, $_SESSION))
            $_SESSION[$this->storageKey] = [];
    }


    private function purgeMessages():void{
        $_SESSION[$this->storageKey]  = [];
    }

    private function getMessages():array{
        return  $_SESSION[$this->storageKey];
    }

    function addMessage(string $message):void{
        $_SESSION[$this->storageKey][] = $message;
    }

    public function hasMessages():bool {
        return count($_SESSION[$this->storageKey]) > 0;
    }

    public function readMessages():array {
        $message = $this->getMessages();
        $this->purgeMessages();
        return $message;
    }
}