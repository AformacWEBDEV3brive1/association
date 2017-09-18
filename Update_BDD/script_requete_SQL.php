




<?php

//Fait le 18/09/2017

include 'parameters.php';


$bdd = openBDD();
$test = $bdd->exec('
CREATE TABLE News
(
    Titre VARCHAR(100),
        Image VARCHAR(100),
        Contenu TEXT(1000),
        Date DATE
        
        
        ); 
CREATE TABLE Reseaux
(
    Type varchar(100), 
    URL varchar(100));
            
CREATE TABLE Carrousel
(
    Image varchar(100),
    Ordre varchar(100));

   
ALTER TABLE site DROP COLUMN photo,
DROP COLUMN reseaux;



');
?>


