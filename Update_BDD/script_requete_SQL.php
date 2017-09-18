




<?php

//Fait le 18/09/2017

include 'parameters.php';


$bdd = openBDD();
$test = $bdd->exec('
CREATE TABLE news
(
    Titre VARCHAR(100),
        Image VARCHAR(100),
        Contenu TEXT(1000),
        Date DATE
        
        
        ); 
CREATE TABLE reseaux
(
    Type varchar(100), 
    url varchar(100));
            
CREATE TABLE carrousel
(
    image varchar(100),
    ordre varchar(100));

   
ALTER TABLE site DROP COLUMN photo,
DROP COLUMN reseaux;



');
?>


