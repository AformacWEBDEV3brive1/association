
<?php

$info = $_POST['info'];
$info();

/* connection a la base de données */

//$bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');
//$reponse = $bdd->query('SELECT * FROM membre');


function liste() {

//recuperation des infos de la base de données
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', 'caca123');

    $reponse = $bdd->query('SELECT * FROM membre');

    while ($donnees = $reponse->fetch()) {
        $data = '<td class="col-2 offset-lg-2 col-lg-1">' . $donnees['nom'] . '</td><td class="col-1 col-lg-1">' . $donnees['prenom'] . '</td><td class="col-2 col-lg-1">' . $donnees['telephone'] . '</td><td class="col-2 col-lg-2  retour">' . $donnees['mail'] . '</td><td class="col-2 col-lg-1">' . $donnees['date_inscription'] . '</td><td class="col-2 col-lg-1">' . $donnees['date_naissance'] . '</td><td class="col-1 col-lg-1">' . $donnees['sexe'];
        $html_tab = render($data);
        echo $html_tab;
    }

    /* global $bdd; //appel de la variable global bdd
      $liste_membres = $bdd->query('SELECT nom , prenom , status FROM membre , status_id WHERE membre.mail = log.mail AND log.mail = status.mail AND status.status = status_id.id');
      return $liste_membres;
      print_r($liste_membres); */
}

function render(/* $query, $style = "table" */$donnees) {//met sous forme de tableau les données
    echo '<tr class="row">' . $donnees . '<tr>';
}

// $all_donnees = $donnees['nom'] . ' ' . $donnees['prenom'] . ' ' . $donnees['status']; //mise en forme des données
//connection a la base de données 



function filter_nom_prenom() {
    echo "test";
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', 'caca123');
    if (isset($_POST['filter']) && isset($_POST['value'])) {
        $filter = $_POST['filter'];
        $value_filter = $_POST['value'];
        echo $value_filter;
        $reponse = $bdd->query('SELECT * FROM membre WHERE ' . $filter . ' LIKE "' . $value_filter . '%"'); //variable qui select les données de la table "membre"
    } else {
        $reponse = $bdd->query('SELECT * FROM membre');
    }
    while ($donnees = $reponse->fetch()) {
        $data = '<td class="col-2 offset-lg-2 col-lg-1">' . $donnees['nom'] . '</td><td class="col-1 col-lg-1">' . $donnees['prenom'] . '</td><td class="col-2 col-lg-1">' . $donnees['telephone'] . '</td><td class="col-2 col-lg-2">' . $donnees['mail'] . '</td><td class="col-2 col-lg-1">' . $donnees['date_inscription'] . '</td><td class="col-1 col-lg-1">' . $donnees['date_naissance'] . '</td><td class="col-2 col-lg-1">' . $donnees['sexe'];
        $html_tab = render($data);
        echo $html_tab;
    }
}

 function filter_statut(){
  if (isset($_POST['statut'])) {
  $value_filter = $_POST['statut'];

  $reponse = $bdd->query('SELECT * FROM membre WHERE statut ="'.$value_filter.'"');//variable qui select les données de la table "membre"
  } else {
  $reponse = $bdd->query('SELECT * FROM membre');

  }
  liste();
  }


  function filter_role(){

  if (isset($_POST['role'])) {
  $value_filter = $_POST['role'];

  $reponse = $bdd->query('SELECT * FROM membre WHERE role ="'.$value_filter.'"');//variable qui select les données de la table "membre"
  } else {
  $reponse = $bdd->query('SELECT * FROM membre');

  }
  liste();
  }
?>
