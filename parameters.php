<?php

$linux_user= "ezaltar";

$connexion_string =  "mysql:host=127.0.0.1;dbname=association;charset=utf8";
$login = "root";
<<<<<<< HEAD

$mdp = "mega6*3zd";
=======
$mdp = "ezaltar";
>>>>>>> branch 'master' of https://github.com/AformacWEBDEV3brive1/association.git

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

