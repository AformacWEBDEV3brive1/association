<?php

//ne pas faire un include de parameters.php parceque les pages qui utilisent debug le font déjà

function debug_php($texte){
    $debug = true;
    if ($debug == true) {
        
        $path = getPathDebugFile();
        $fp = fopen($path,'a+'); // ouvrir le fichier ou le créer
       
        fputs($fp,$texte."\n"."\r"); // ecrire ce texte
        fclose($fp); //fermer le fichier
    }
}

?>

