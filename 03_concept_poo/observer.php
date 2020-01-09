<?php

/********************************************************************
 *
 * DESIGN PATTERN : OBSERVER
 *
 *
 */

// observer : cible concernée par l'évenement
abstract class AbstractObserver{

    // qu'est ce que je fais quand l'evênement s'est produit
    abstract function update();
}

// observable : le sujet de l'interaction
abstract class AbstractSubject{

    // gestion des inscriptions
    abstract function subscribe(AbstractObserver $observer);
    abstract function unsubscribe(AbstractObserver $observer);

    // informer les observateurs du changement d'état
    abstract function notify();

}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///                                             DEFINITION
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class User extends AbstractObserver{
    // j'ai reçu la notification, qu'est ce que je fais ?
    function update(){
        echo "<p>Ah ! Cool J'ai reçu un message je peux le lire</p>";
    }
}

class Messenger extends AbstractSubject{

    // on va stocker tous les utilisateurs
    private $observers = [];

    function subscribe(AbstractObserver $observer) {
        $this->observers[] = $observer;
    }

    function unsubscribe(AbstractObserver $observer){
        if($index = array_search($observer, $this->observers)){
            unset($this->observers[$index]);
        }
    }

    function notify(){
        foreach ($this->observers as $observer){
            $observer->update();
        }
    }
}

////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///                                             UTILISATION
////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$messenger = new Messenger();
$utilisateur = new User();

// j'ai une demande en particulier, fait moi signe quand ça se produit
$messenger->subscribe($utilisateur);

// l'évênement se produit (j'ai reçu un message) je dois prévenir mes abonnés
$messenger->notify();

// finalement marre des spam, je me désabonne
$messenger->unsubscribe($utilisateur);


////////////////////////////////////////////////////////////////////////////////////////////////////////////////
///                                             ENTRAINEMENT
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*
Application du design patter observerInformer l'utilisateur d'un produit ajouté au panier

Utiliser l'exercice déjà réalisé;
Il s'agit de  notifier  à l'écran quand un produit à été ajouté au panier (après que l'utilisateur ai cliqué
sur le bouton évidement
*/