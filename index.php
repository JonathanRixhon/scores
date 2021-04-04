<?php
//CONSTANTES
define('FILE_PATH', 'matches.csv');

//Variable
$matches = [];
$handle = fopen(FILE_PATH, 'r'); //r = read, fopen stock le contenu du fichier dans $handle
$headers = fgetcsv($handle, 1000, ','); // on récupère les headers car cette fonction ne prend qu'une ligne

//récupération et création du tableau $matches
while ($line = fgetcsv($handle, 1000, ',')) {
    //fgetcsv ne prend qu'une ligne à la fois
    //la boucle continue tant que fgetcsv() revoie quelque chose
    $matches[] = array_combine($headers, $line);
}

/* --------------TEMPLATE-------------- */
// require renvoit une erreur fatale, inculde ne fait pas d'erreur.
//on ajoute _once pour alerter si il charge le fichier 2fois
include('./vue.php');
