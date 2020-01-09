<?php


namespace ProBio;

trait Observable
{
    // gestion des inscriptions
    abstract function subscribe(AbstractObserver $observer);
    abstract function unsubscribe(AbstractObserver $observer);

    // informer les observateurs du changement d'état
    abstract function notify();

}
