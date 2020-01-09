<?php
/*
Créez un générateur pour afficher dans une liste ul.li les noms et
numéros de téléphone de chaque personne de la liste suivante 
*/
$users = <<<EOF
Alan,13254
Albert,51235
John,65233
Alice,85213
Richard,21359
EOF;


function afficher_users($str)
{
    $users_tab = explode(PHP_EOL, $str);// VARIABLE PHP EOL => End Of Line
    // PHP_EOL => ubuntu => \n
    // PHP_EOL => windows => \n\r
    /*
    https://www.php.net/manual/fr/reserved.constants.php
    PHP_EOL (chaîne de caractères)
    Le bon symbole de fin de ligne pour cette plateforme. Disponible depuis PHP 5.0.2
    */
    foreach($users_tab as $user)
    {
        $detail = explode(',', $user);
        yield '<ul><li> Nom : '.$detail[0].'</li><li> Tel : '.$detail[1].'</ul>';
    }
}

$affichage = afficher_users($users);
foreach($affichage as $result)
{
    echo $result;
}

?>