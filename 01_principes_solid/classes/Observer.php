<?php


namespace ProBio;

// observer : cible concernée par l'évenement
interface Observer{

    // qu'est ce que je fais quand l'evênement s'est produit
    function update(string $string);
}
