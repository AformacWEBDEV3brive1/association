<?php

$info = $_POST['info'];
$info();

function liste() {

//recuperation des infos de la base de données
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', 'caca123');

    $reponse = $bdd->query('SELECT * FROM membre');

    while ($donnees = $reponse->fetch()) {
        $data = '<td class="col-2 offset-lg-2 col-lg-1">' . $donnees['nom'] . '</td><td class="col-1 col-lg-1">' . $donnees['prenom'] . '</td><td class="col-2 col-lg-1">' . $donnees['telephone'] . '</td><td class="col-2 col-lg-2  retour">' . $donnees['mail'] . '</td><td class="col-2 col-lg-1">' . $donnees['date_inscription'] . '</td><td class="col-2 col-lg-1">' . $donnees['date_naissance'] . '</td><td class="col-1 col-lg-1">' . $donnees['sexe'];
        $html_tab = render($data);
        echo $html_tab;
    }
}

function render(/* $query, $style = "table" */$donnees) {//met sous forme de tableau les données
    echo '<tr class="row">' . $donnees . '<tr>';
}

function filter_nom_prenom() {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');
    if ( isset($_POST['filter']) && isset($_POST['value']) ) {
        /*valeur du select*/
        $filter = $_POST['filter'];
        /*valeur de l'input utilisateur*/
        $value_filter = $_POST['value'];
        
        /*la variable qui va contenir la requete*/
        $requete = "";
         
        /*switch pour determiner l'id statut à partir de ce qu'a mis l'utilisateur*/
        if($filter == "statut")
        {
            $idStatut = 0;
            switch($value_filter)
            {
                case "directeur":
                    $idStatut = 0;
                    break;
                case "sous-directeur":
                    $idStatut = 1;
                    break;
                case "tresorier":
                    $idStatut = 2;
                    break;
                case "secretaire":
                    $idStatut = 3;
                    break;
                case "benvole":
                    $idStatut = 4;
                    break;
                default:
                    $requete = "SELECT * FROM membre";
            }
        }
            
        /*switch pour determiner l'id role à partir de ce qu'a mis l'utilisateur*/
        if($filter == "role")
        {
            $idRole = 0;
            switch($value_filter)
            {
                case "administrateur":
                    $idRole = 0;
                    break;
                case "moderateur":
                    $idRole = 1;
                    break;
                case "troufion":
                    $idRole = 2;
                    break;
                case "benevole":
                    $idRole = 3;
                    break;
                default:
                    $requete = "SELECT * FROM membre";
            }
        }
        
        /*switch pour construire la requete; si l'utilisateur à mis n'importe quoi avec statut ou role la requete est SELECT * FROM membre (voir les cases default) */
       if($requete == "")
        {
            switch($filter)
            {
                case "nom":
                    $requete = 'SELECT * FROM membre WHERE nom LIKE "' . $value_filter . '%"';
                    break;
                case "prenom":
                    $requete = 'SELECT * FROM membre WHERE prenom LIKE "' . $value_filter . '%"';
                    break;
                case "statut":
                    $requete = 'SELECT membre.nom, membre.prenom, membre.telephone, membre.mail, membre.date_inscription, membre.date_naissance, membre.sexe FROM membre INNER JOIN status ON membre.mail = status.mail WHERE status.status = "' . $idStatut . '"';
                    break;
                case "role":
                    $requete = 'SELECT membre.nom, membre.prenom, membre.telephone, membre.mail, membre.date_inscription, membre.date_naissance, membre.sexe FROM membre INNER JOIN role ON membre.mail = role.mail WHERE role.role = "' . $idRole . '"';
                    break;     
            }
        }

        $reponse = $bdd->query($requete); 
    } 
    else {
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