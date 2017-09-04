<?php

//connection a la base de données 
$bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');


function filter_nom_prenom(){

    if (isset($_POST['filter']) && isset ($_POST['value'])) {
    $filter = $_POST['filter'];
    $value_filter = $_POST['value'];
    
    $reponse = $bdd->query('SELECT * FROM membre WHERE'. $filter.' LIKE"'.$value_filter.'%"');//variable qui select les données de la table "membre"
} else {
    $reponse = $bdd->query('SELECT * FROM membre');
    
}
liste();
}


/*function filter_statut(){
if (isset($_POST['statut'])) {
    $value_filter = $_POST['statut'];
    
    $reponse = $bdd->query('SELECT * FROM membre WHERE statut ="'.$value_filter.'"');//variable qui select les données de la table "membre"
} else {
    $reponse = $bdd->query('SELECT * FROM membre');
    
}
liste();
}


function filter_role(){
    
    if (isset($_POST['role'])) {
    $value_filter = $_POST['role'];
    
    $reponse = $bdd->query('SELECT * FROM membre WHERE role ="'.$value_filter.'"');//variable qui select les données de la table "membre"
} else {
    $reponse = $bdd->query('SELECT * FROM membre');
    
}
liste();
}*/


$reponse = $bdd->query('SELECT * FROM role_id ');//variable qui select les données de la table "membre"


liste();//lance la fonction liste

function liste() {//recuperation des infos de la base de données
    global $reponse;
    
    //creation du tableau 
    while ($donnees = $reponse->fetch()) {
        
        $data = '<td>' . $donnees['id'] . '</td><td>' . $donnees['nom'] . '</td>';
        //$data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'];
        $html_tab = render($data);//rajoute des balises <tr> grace a la fonction render
        echo $html_tab;
    }
}

function render($data) {//met sous forme de tableau les données
    echo '<tr>' . $data . '<tr>';
}


?>
