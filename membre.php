<?php


include 'parameters.php';

include 'includes/header.php'; //inclusion de l'header dans toute les pages.

?>



<body>
    <?php
    include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.
    include 'includes/test_log.php';
    include 'includes/age.php';
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
                $age_v=birthday_to_age($donnees['date_naissance']);
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
         '<br/> Age: ' . $age_v;
         
           
        }
}

?>

</body>


</html>