<?php

include '../debug.php';
include '../parameters.php';
debug_php('debug1111');
//echo 'coucou';
debug_php('debug2222');
$info = $_POST['info'];
$info();
//appel du fichier où  sont enregistrés les chaines de connexion


//appel de la fonction getForm pour recuperer les valeurs du formulaire
//getForm();
// foonction générique en commentaire en attendant que le formulaire soit en place :



function getForm() {
    debug_php('debut_getForm');
    $data = array(
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'telephone' => $_POST['telephone'],
        'mail' => $_POST['mail'],
        'date_inscription' => $_POST['dateI'],
        'date_naissance' => $_POST['dateN'],
        'sexe' => $_POST['sexe'],
        'role' => $_POST['role'],
        'status' => $_POST['status'],
        'log' => $_POST['log'],
        'mdp' => $_POST['mdp']
    );
    //debug_php($data);
    //print_r($data);
    user_new($data);
}

// informations en durs pour simuler un formulaire :
/* function getForm() {
 $data = array(
 'nom' => 'yves',
 'prenom' => 'laurent',
 'telephone' => '0748995500',
 'mail' => 'yves.laurent@gmail.com',
 'date_inscription' => 'qsmw123456789',
 'date_naissance' => '987654321',
 'sexe' => 'M',
 'log' => 'yvesl',
 'mdp' => crypt('poiue31654','yves.laurent@gmail.com'),
 'role' => '2',
 'status' => '4',
 );
 //print_r($data);
 //user_new($data);
 } */


//récupere l'Id du role a partir du nom du role
function getRoleIdByName($nom) {
    try {//essaie de lancer les instructions
        $db = openBDD();
        
        $res = $db->query("SELECT id FROM role_id WHERE nom = '$nom'");
    } catch (PDOExeption $e) {//retourne le message d'erreur
        echo $e->getMessage();
    }
    //ferme la base de donnée
    $db = null;
    
    //retourne la 1° valeur du resultat
    return $res->fetch()[0];
}

//recupere nom du role grace a l'id
function getNameByRoleId($id) {
    try {
        $db = openBDD();
        
        $res = $db->query("SELECT nom FROM role_id WHERE id='$id'");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $db = null;
    
    return $res->fetch()[0];
}

//récupere l'Id du statut a partir du nom du statut
function getStatusIdByName($status) {
    try {//essaie de lancer les instructions
        $db = openBDD();
        
        $res = $db->query("SELECT id FROM status_id WHERE status = '$status'");
    } catch (PDOExeption $e) {//retourne le message d'erreur
        echo $e->getMessage();
    }
    //ferme la base de donnée
    $db = null;
    
    //retourne la 1° valeur du resultat
    return $res->fetch()[0];
}

//recupere nom du statut grace a l'id
function getNameByStatusId($id) {
    try {
        $db = openBDD();
        
        $res = $db->query("SELECT status FROM status_id WHERE id='$id'");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    
    $db = null;
    
    return $res->fetch()[0];
}

//echo getRoleIdByName('troufion');
//echo getNameByRoleId('2');

function user_new($data) {
    $bdd = openBDD();
    $query = "";
    $query .= user_insert() . ";";
    $query .= user_insert("log") . ";";
    
    $tableau_valeurs = array(
        'nom' => $data['nom'],
        'prenom' => $data['prenom'],
        'telephone' => $data['telephone'],
        'mail' => $data ['mail'],
        'date_inscription' => $data['date_inscription'],
        'date_naissance' => $data['date_naissance'],
        'sexe' => $data['sexe'],
        'log' => $data['log'],
        'mdp' => $data['mdp']
    );
    
    if(isset($_POST["status"]) && $_POST["status"]!="Vide")
    {
        debug_php('il y a un status');
        $query .= user_insert("status") . ";";
        $tableau_valeurs['status'] = $data['status'];
    }
    
    if(isset($_POST["role"]) && $_POST["role"]!="Vide")
    {
        debug_php('il y a un role');
        $query .= user_insert("role") . ";";
        $tableau_valeurs['role'] = $data['role'];
    }
    
    
    
    //print_r($query);
    // si $mode = complet
    // alors concatener $query à un insert qui insert dans les tables status et role
    
    $req_membre = $bdd->prepare($query);
    
    $tmp = $req_membre->execute($tableau_valeurs);
    
    /*echo '<br/>';
     print_r($tmp);
     echo 'error requete';
     print_r($req_membre->errorInfo());
     */
    
    $bdd = null;
    debug_php('testCOUCOU');
    echo "Le membre à été ajouté avec succès!";
}

/* Fonction qui sert a inserer de nouvelle entrée */

function user_insert($table = "membre") {
    if ($table == "membre") {//insert dans la table membre
        return "INSERT INTO membre(nom, prenom, telephone, mail, date_inscription, date_naissance, sexe)
           VALUES (:nom, :prenom, :telephone, :mail, :date_inscription, :date_naissance, :sexe)";
    } else if ($table == "log") {//insert dans la table log
        return "INSERT INTO log(log, mdp, mail) VALUES (:log, :mdp, :mail)";
    } else if ($table == "role") {//insert dans la table role
        return "INSERT INTO role(role, mail) VALUES (:role, :mail)";
    } else if ($table == "status") {//insert dans la table status
        return "INSERT INTO status(status, mail) VALUES (:status, :mail)";
    }
}

//supprime un utilisateur par son mail
function user_delete() {
   
    $db = openBDD();
    
    try {
        $sup = $db->exec("DELETE FROM `membre` WHERE mail= '".$_POST['mail']."'");
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    $db = null;
}



?>



