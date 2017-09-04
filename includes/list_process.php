<?php

//connection a la base de données 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');

$reponse = $bdd->query('SELECT * FROM membre');//variable qui select les données de la table "membre"

liste();//lance la fonction liste

function liste($filter) {//recuperation des infos de la base de données
    global $reponse;
    
    //creation du tableau 
    while ($donnees = $reponse->fetch()) {
        
        $data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'];
        $html_tab = render($data);//rajoute des balises <tr> grace a la fonction render
        echo $html_tab;
    }
}

function render($data) {//met sous forme de tableau les données
    echo '<tr>' . $data . '<tr>';
}


?>
