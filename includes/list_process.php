<?php

include '../parameters.php';
include 'age.php';
if (isset($_POST['info'])) {
    $info = $_POST['info'];
    $info();
}

function liste() {

//recuperation des infos de la base de données
    //$bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456789$');

    $bdd = openBDD();


    $reponse = $bdd->query('SELECT * FROM membre');

    $i = 0;
    while ($donnees = $reponse->fetch()) {
        $date_i = date('d/m/y', $donnees['date_inscription']);
        if ($donnees['date_naissance'] != '') {
            $date_n = date('d/m/y', $donnees['date_naissance']);
            $age_v = birthday_to_age($donnees['date_naissance']);
        } else {
            $date_n = '';
        }
//$nomModif $prenomModif permettent de couper les noms et prenoms et ajoute '...'
//Pour les suppression:
//classe identique pour trash et mail concatené à chaques tours de boucle,
//permet de selectionner le mail qui est sur la même ligne que la poubelle sur laquelle on a cliquer
        $nomModif = strlen($donnees['nom']) > 5 ? substr($donnees['nom'], 0, 3) . '...' : $donnees['nom'];
        $prenomModif = strlen($donnees['prenom']) > 5 ? substr($donnees['prenom'], 0, 3) . '...' : $donnees['prenom'];
        $data = '<td class="col-2  col-md-1 col-lg-1 ">' . $nomModif . '</td> '
                . '<td class="col-2 col-md-1 col-lg-1 ">' . $prenomModif . '</td> '
                . '<td class="col-md-2 numb col-lg-2 ">' . $donnees['telephone'] . '</td> '
                . '<td class="col-md-3 col-lg-2  retour mail' . $i . ' email">' . $donnees['mail'] . '</td>'
                . '<td class="col-3 col-md-2 col-lg-2 dateI">' . $date_i . '</td>'
                . '<td class="  dateN">' . $date_n . '</td> '
                . '<td class="  sexe">' . $donnees['sexe'] . '</td> '
                . '<td class=" col-md-1 col-lg-1 age">' . $age_v . '</td> '
                . '<td class="col-5 col-md-2 col-lg-3  actions">
                    <div class="row">
                <a class="fa fa-info fa-2x infos" href="membre.php?mail=' . $donnees['mail'] . '"></a>
                <a href="mailto:' . $donnees['mail'] . '" class=" fa fa-envelope-o fa-2x envelope" ></a>               
                <a  class="fa fa-trash fa-2x trash mail' . $i . '  "></a>
                
                <a href="index.php" class=" fa fa-pencil-square-o fa-2x pencil" ></a>
                </td>
              </div> ';

        $html_tab = render($data, $donnees['mail']);
        echo $html_tab;
        $i++;
    }
}

function render(/* $query, $style = "table" */$donnees) {//met sous forme de tableau les données
    echo '<tr class="row">' . $donnees . '<tr>';
}

function filter_nom_prenom() {
    $bdd = openBDD();
    if (isset($_POST['filter']) && isset($_POST['value'])) {
        /* valeur du select */
        $filter = $_POST['filter'];
        /* valeur de l'input utilisateur */
        $value_filter = $_POST['value'];

        /* la variable qui va contenir la requete */
        $requete = "";

        /* switch pour determiner l'id statut à partir de ce qu'a mis l'utilisateur */
        if ($filter == "statut") {
            $idStatut = 0;
            switch ($value_filter) {
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

        /* switch pour determiner l'id role à partir de ce qu'a mis l'utilisateur */
        if ($filter == "role") {
            $idRole = 0;
            switch ($value_filter) {
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

        /* switch pour construire la requete; si l'utilisateur à mis n'importe quoi avec statut ou role la requete est SELECT * FROM membre (voir les cases default) */
        if ($requete == "") {
            switch ($filter) {
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
    } else {
        $reponse = $bdd->query('SELECT * FROM membre');
    }
    while ($donnees = $reponse->fetch()) {
        $date_i = date('d/m/y', $donnees['date_inscription']);
        if ($donnees['date_naissance'] != '') {
            $date_n = date('d/m/y', $donnees['date_naissance']);
            $age_v = birthday_to_age($donnees['date_naissance']);
        } else {
            $date_n = '';
        }
        $nomModif = strlen($donnees['nom']) > 5 ? substr($donnees['nom'], 0, 3) . '...' : $donnees['nom'];
        $prenomModif = strlen($donnees['prenom']) > 5 ? substr($donnees['prenom'], 0, 3) . '...' : $donnees['prenom'];
        $data = '<td class="col-2  col-md-1 col-lg-1 ">' . $nomModif . '</td> '
                . '<td class="col-2 col-md-1 col-lg-1 ">' . $prenomModif . '</td> '
                . '<td class="col-md-2 numb col-lg-2 ">' . $donnees['telephone'] . '</td> '
                . '<td class="col-md-3 col-lg-2  retour mail' . $i . ' email">' . $donnees['mail'] . '</td>'
                . '<td class="col-3 col-md-2 col-lg-2 dateI">' . $date_i . '</td>'
                . '<td class="  dateN">' . $date_n . '</td> '
                . '<td class="  sexe">' . $donnees['sexe'] . '</td> '
                . '<td class=" col-md-1 col-lg-1 age">' . $age_v . '</td> '
                . '<td class="col-5 col-md-2 col-lg-3  actions">
                    <div class="row">
                <a class="fa fa-info fa-2x infos" href="membre.php?mail=' . $donnees['mail'] . '"></a>
                <a href="mailto:' . $donnees['mail'] . '" class=" fa fa-envelope-o fa-2x envelope" ></a>               
                <a  class="fa fa-trash fa-2x trash mail' . $i . '  "></a>
                
                <a href="index.php" class=" fa fa-pencil-square-o fa-2x pencil" ></a>
                </td>
              </div> ';

        $html_tab = render($data, $donnees['mail']);
        echo $html_tab;
        $i++;
    }
}

?>
