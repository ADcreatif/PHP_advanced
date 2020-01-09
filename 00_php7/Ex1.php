<?php
/*
Faites un script permettant d’afficher les valeurs de la suite de
Fibonacci dans un fichier Ex1.php en utilisant un générateur
*/
// https://www.php.net/manual/fr/language.generators.syntax.php
/*
function gen_one_to_three()
{
    for ($i = 1; $i <= 3; $i++)
    {
        yield $i;
    }
}
var_dump(gen_one_to_three());
$generator = gen_one_to_three();
foreach ($generator as $value)
{
    var_dump("RESULTAT > ", $value);
}
*/
function fibonacci()
{
    echo "Etape 1\n";
    yield 0;// PREMIER APPEL
    // PAUSE
    echo "Etape 2\n";
    yield 1;// DEUXIEME APPEL
    // PAUSE
    $valeur0 = 0;
    $valeur1 = 1;
    $stop = 0;
    echo "Etape 3\n";
    while ($stop < 1e1)// 1 * 10^3
    {
        $valeur2 = $valeur0 + $valeur1;
        yield $valeur2;// PAUSE
        $valeur0 = $valeur1;
        $valeur1 = $valeur2;
        $stop++;
    }
    echo "Etape 4\n";
}
$generator = fibonacci();
foreach ($generator as $value)
{
    echo $value."\n";
}

?>