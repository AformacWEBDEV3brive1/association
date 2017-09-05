<?php

$info = $_POST['info'];
$info();

function liste() {

//recuperation des infos de la base de données
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');

    $reponse = $bdd->query('SELECT * FROM membre');

    while ($donnees = $reponse->fetch()) {
        /*$data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'];*/
        $data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'] . '</td><td><button id='. $donnees['mail']  . ' name="buttonDetails" >Details</button></td>';
        $html_tab = render($data);
        echo $html_tab;
    }
}

function render(/* $query, $style = "table" */$donnees) {//met sous forme de tableau les données
    echo '<tr>' . $donnees . '<tr>';
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
        $data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'];
        $html_tab = render($data);
        echo $html_tab;
    }
}

function pageDetaillee() {

    if(isset($_POST['mail']))
    {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456');

        $reponse = $bdd->query('SELECT * FROM membre WHERE mail = "' . $_POST['mail'] . '"');

        while ($donnees = $reponse->fetch()) {
        $data = '<td>' . $donnees['nom'] . '</td><td>' . $donnees['prenom'] . '</td><td>' . $donnees['telephone'] . '</td><td>' . '</td><td>' . $donnees['mail'] . '</td><td>' . $donnees['date_inscription'] . '</td><td>' . $donnees['date_naissance'] . '</td><td>' . $donnees['sexe'];
            $html_tab = render($data);
            echo $html_tab;
        }
    }

}
?>
