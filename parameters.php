<?php

$linux_user= "christian";

$connexion_string =  "mysql:host=127.0.0.1;dbname=association;charset=utf8";
$login = "root";


$mdp = "123456789$";



function openBDD()
{
    global $connexion_string;
    global $login;
    global $mdp;
    $bdd = new PDO($connexion_string, $login, $mdp);
    return $bdd;
}


function getPathDebugFile()
{
    global $linux_user;
    
    $path = "/home/" . $linux_user . "/Bureau/tmp/debug.log";

    return $path;
}


?>

