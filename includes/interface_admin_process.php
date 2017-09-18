<?php

include '../parameters.php';
//recuperation des variables de la page interface_admin.php
$titre = $_POST["titre"];
$message = $_POST["message"];
$image_principale = $_POST["image_principale"];
$image_secondaire = $_POST["image_secondaire"];
$reseau = $_POST["reseaux"];

// modifie la base de données
function update() {
    global $titre;
    global $message;
    global $image_principale;
    global $image_secondaire;
    global $reseau;

    try {
        $db = openBDD();
        
        $bdd = $db->prepare('UPDATE site SET image = ?,
             photo = ?,
             titre = ?,
             message = ?,
             reseaux = ?');
        $bdd->execute(array($image_secondaire, $image_principale, $titre, $message, $reseau,));
    } catch (PDOException $e) {
        echo $e->getMessage();
        print_r("test");
    }
    // header redirige vers la page administration
    header("Location: http://localhost/association/interface_admin.php");
    exit("La redirection ne s'est pas effectuée");

    return $bdd->fetchAll();
}

update();
?>