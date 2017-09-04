<?php
$info = $_POST['info'];
$info();

/* connection a la base de données */
//$bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');

//$reponse = $bdd->query('SELECT * FROM membre');


liste();
function liste() {
  
//recuperation des infos de la base de données
   $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', 'caca123');

$reponse = $bdd->query('SELECT * FROM membre');

    while ($donnees = $reponse->fetch()) {
        $data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'];
        $html_tab = render($data);
        echo $html_tab;
    }

    /* global $bdd; //appel de la variable global bdd
      $liste_membres = $bdd->query('SELECT nom , prenom , status FROM membre , status_id WHERE membre.mail = log.mail AND log.mail = status.mail AND status.status = status_id.id');
      return $liste_membres;
      print_r($liste_membres); */
}

function render(/* $query, $style = "table" */$donnees) {//met sous forme de tableau les données
    echo '<tr>' . $donnees . '<tr>';
}

// $all_donnees = $donnees['nom'] . ' ' . $donnees['prenom'] . ' ' . $donnees['status']; //mise en forme des données
?>