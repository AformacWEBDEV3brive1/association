<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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