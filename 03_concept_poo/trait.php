<?php

/**
 * Les traits sont une simulation de l'héritage multiple
 * on peut implémenter des méthodes et attributs, privés et publiques, abstraits, comme d'autres clases
 * la classe qui implément un trait peut redéfinir la portée des membre du trait qu'elle implémente
 * insteadof est le resolveur de conflit qui permet de choisir entre deux méthodes de meme nom
 */
trait Bonjour{
    private function sayHello(): string {
        return 'Hello ';
    }
}

trait MonTrait{
    private $name;
    abstract function setName($name):void;
    private function getName(): string {
        return $this->name;
    }
}

class Introduction
{
    use MonTrait, Bonjour { sayHello as public;}

    public function display():string {
        return $this->sayHello() . $this->getName();
    }

    public function setName($name): void{
        $this->name = $name;
    }

    public function __toString(){
        return $this->display();
    }
}

$intro = new Introduction();
$intro->setName('Alan');
echo $intro;

//////////////////////////////////////////////////////////////////////////////////////////////////////
///                                 RESOLUTION DE CONFLITS
//////////////////////////////////////////////////////////////////////////////////////////////////////


trait TalkA{
    function talking(){ return 'talking about revolution'; }
}
trait TalkB{
    function talking(){ return 'why 42 ?'; }
}

class Talker{
    use TalkA, TalkB { TalkA::talking insteadof TalkB; }
}

$talker = new Talker();
echo "<br>". $talker->talking();

