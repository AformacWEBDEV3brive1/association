<?php


include 'parameters.php';

include 'includes/header.php'; //inclusion de l'header dans toute les pages.

?>


<body>
    <?php
    include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.
    include 'includes/test_log.php';
    ?>




<?php

/*pour l'instant le mail sert d'identifiant mais il faudrait travailler avec un vrai id;
on récupère le mail dans l'adresse et on fait une requête pour obtenir les infos du membre */

if(isset($_GET['mail']))
{


        $bdd = openBDD();


        $reponse = $bdd->query('SELECT * FROM membre WHERE mail = "' . $_GET['mail'] . '"');

        while ($donnees = $reponse->fetch()) {
            $date_i = date('d/m/Y',$donnees['date_inscription']);
            if($donnees['date_naissance'] != ''){
                $date_n = date('d/m/Y',$donnees['date_naissance']);
                echo $donnees['date_naissance'].'<br/>';
                
                $date_a= time();
                
                echo $date_a;
                $age=$date_a-$donnees['date_naissance'];
                $date_age = (((($age/60)/60)/24)/365);
                $age_vrai= '<br/> Age: ' . floor($date_age);
            }
            else{
                $date_n = '';
            }
            
         echo 'Nom: ' . $donnees['nom'] .
         '<br/> Prénom: ' . $donnees['prenom'] .
         '<br/> Téléphone: ' . $donnees['telephone'] .
         '<br/> Mail: ' . $donnees['mail'] .
         "<br/> Date d'inscription: " . $date_i .
         '<br/> Date de naissance: ' . $date_n .
         '<br/> Sexe: ' . $donnees['sexe'].
         $age_vrai;
         
           
        }
}

?>

</body>


</html>