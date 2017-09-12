<?php

include 'parameters.php';

function display_roles(){
    $bdd = openBDD();
    
    $reponse = $bdd->query('SELECT * FROM role_id');
    
    // Pour permettre de selectionner un champ vide
    echo "<option value='Vide'></option>";
    
    //Rapatriement des differents roles stockes dans la base
    while ($donnees = $reponse->fetch()) {
        echo "<option value='" . $donnees['id'] . " '>" . $donnees['nom'] . "</option>";
    }
    
    $bdd = null;
}

function display_status(){
    $bdd = openBDD();
    
    $reponse = $bdd->query('SELECT * FROM status_id');
    
    // Pour permettre de selectionner un champ vide
    echo "<option value='Vide'></option>";
    
    //Rapatriement des differents status stockes dans la base
    while ($donnees = $reponse->fetch()) {
        echo "<option value='" . $donnees['id'] . " '>" . $donnees['status'] . "</option>";;
    }
    
    $bdd = null;
}
?>

