<?php

function debug_php($texte){
    $debug = true;
    if ($debug == true) {
        
       
        $fp = fopen('/home/ezaltar/Bureau/tmp/debug.log','a+'); // ouvrir le fichier ou le créer
       
        fputs($fp,$texte."\n"."\r"); // ecrire ce texte
        fclose($fp); //fermer le fichier
    }
}

?>

