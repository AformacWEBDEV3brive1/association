<?php
include 'includes/parameters.php';

include 'includes/header.php'; //inclusion de l'header dans toute les pages.
?>


<body>
    <?php
    include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.
    ?>




    <?php
    /* pour l'instant le mail sert d'identifiant mais il faudrait travailler avec un vrai id;
      on récupère le mail dans l'adresse et on fait une requête pour obtenir les infos du membre */

    if (isset($_GET['mail'])) {
        global $connexion_string;
        global $login;
        global $mdp;
        $bdd = new PDO($connexion_string, $login, $mdp);

        $reponse = $bdd->query('SELECT * FROM membre WHERE mail = "' . $_GET['mail'] . '"');

        while ($donnees = $reponse->fetch()) {
            echo 'Nom: ' . $donnees['nom'] . '<br/> Prénom: ' . $donnees['prenom'] . '<br/> Téléphone: ' . $donnees['telephone'] . '<br/> Mail: ' . $donnees['mail'] . "<br/> Date d'inscription: " . $donnees['date_inscription'] . '<br/> Date de naissance: ' . $donnees['date_naissance'] . '<br/> Sexe: ' . $donnees['sexe'];
        }
    }
    ?>

</body>


</html>