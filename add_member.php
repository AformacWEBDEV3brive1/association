<?php

//appel du fichier où  sont enregistrés les chaines de connexion
include 'parameters.php';

//appel de la fonction getForm pour recuperer les valeurs du formulaire
getForm();

/* foonction générique en commentaire en attendant que le formulaire soit en place :
  function getForm(){
  $nom = $_POST['nom'];
  $prenom = $_POST['prenom'];
  $telephone = $_POST['telephone'];
  $mail = $_POST['mail'];
  $date_inscription = $_POST['date_inscription'];
  $date_naissance = $_POST['date_naissance'];
  $sexe = $_POST['sexe'];
  $role = $_POST['role'];
  $status = $_POST['status'];
  $login = $_POST['login'];
  $mdp = crypt($_POST['mdp']);
  $role = $_POST['role'];
  $status = $_POST['status'];
  } */

// informations en durs pour simuler un formulaire :
function getForm() {
    $data = array(
        'nom' => 'yves',
        'prenom' => 'laurent',
        'telephone' => '0748995500',
        'mail' => 'yves.laurent@gmail.com',
        'date_inscription' => '123456789',
        'date_naissance' => '987654321',
        'sexe' => 'M',
        'log' => 'yvesl',
        'mdp' => crypt('poiue31654'),
        'role' => '2',
        'status' => '4',
    );
    print_r($data);
    user_new($data);
}

function user_new($data, $mode="simple") {
    global $connexion_string;
    global $login;
    global $mdp;

    //variable pour la chaine de connexion PDO..
    $bdd = new PDO($connexion_string, $login, $mdp);
    $query="";
    $query .= user_insert().";";
    $query .= user_insert("log").";";
    $query .= user_insert("role").";";
    $query .= user_insert("status");
    
    print_r($query);
    
    // si $mode = complet 
        // alors concatener $query à un insert qui insert dans les tables status et role 
    
    $req_membre = $bdd->prepare($query);

    $test = $req_membre->execute(array(
        ':nom' => $data['nom'],
        ':prenom' => $data['prenom'],
        ':telephone' => $data['telephone'],
        ':mail' => $data ['mail'],
        ':date_inscription' => $data['date_inscription'],
        ':date_naissance' => $data['date_naissance'],
        ':sexe' => $data['sexe'],
        ':log' => $data['log'],
        ':mdp' => $data['mdp'],
        ':role' => $data['role'],
        ':status' => $data['status'],
    ));
}


/*Fonction qui sert a inserer de nouvelle entrée*/
function user_insert($table="membre"){
    if($table =="membre"){//insert dans la table membre
        return "INSERT INTO membre(nom, prenom, telephone, mail, date_inscription, date_naissance, sexe) 
           VALUES (:nom, :prenom, :telephone, :mail, :date_inscription, :date_naissance, :sexe)";
    }
    else if ($table=="log"){//insert dans la table log
        return "INSERT INTO log(log, mdp, mail) VALUES (:log, :mdp, :mail)";
    }
    else if ($table=="role"){//insert dans la table role
        return "INSERT INTO role(role, mail) VALUES (:role, :mail)";
    }
    else if ($table=="status"){//insert dans la table status
        return "INSERT INTO status(status, mail) VALUES (:status, :mail)";
    }
}
?>



