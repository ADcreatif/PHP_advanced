<?php
// 1. RETOURNER LES TACHES DANS L'ORDRE DES PRIORITES (priority)
// 2. Créer une fonction anonyme a partir du code de la propriété "callback"
// 3. Executer la fonction avec les paramètres dans la prop "params"
// 4. Votre generateur retourne le résultat
$tasks = [
    [
        'callback' => function (int $a, int $b): int {
            return $a + $b;
        },
        'params' => [1,3],
        'priority' => 1000
    ],
    [
        'callback' => function (int $a, int $b): float {

            if ($b == 0) throw new DivisionByZeroError('diviseur égale à zéro impossible');

            return round($a / $b, 2);
        },
        'params' => [4,2],
        'priority' => 1
    ],
    [
        'callback' => function (int $a, int $b): int {
            return $a * $b;
        },
        'params' => [6,4],
        'priority' => 500,
    ]
];
function handleTask($tab)
{
    // https://www.php.net/manual/fr/function.usort.php
    usort($tab, function($a, $b)
    {
        return $b['priority'] <=> $a['priority'];
    });
    for ($i = 0; $i < sizeof($tab); $i++)
    {
        yield $tab[$i]['callback']($tab[$i]['params'][0], $tab[$i]['params'][1]);
    }
    /*
    yield $tab[0]['callback']($tab[0]['params'][0], $tab[0]['params'][1]);// 4
    yield $tab[2]['callback']($tab[2]['params'][0], $tab[2]['params'][1]);// 24
    yield $tab[1]['callback']($tab[1]['params'][0], $tab[1]['params'][1]);// 2
    */
}
$generator = handleTask($tasks);
foreach ($generator AS $result)
{
    var_dump($result);
}
?>