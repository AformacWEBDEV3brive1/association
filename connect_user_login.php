
<?php

$acces = false;

$bdd = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', 'rastaman66');

/* These are our valid username and passwords */
$user = $bdd->query("SELECT log, mdp, mail FROM `log`");//on regarde dans la BDD

$user = $user->fetchAll();//on va chercher dans la BDD
/*echo '<pre>';
print_r($user);
echo'</pre>';*/

$username = $_POST['username'];
$password = $_POST['password'];


if (isset($_POST['username']) && isset($_POST['password'])){ //si les champs sont pleins
    
    foreach($user as $value ){
        if( $value[1]==$password && $value[2] == $username || $value[1]==$password && $value[0] == $username){//comparaison post et BDD
         
           $acces = true;
           continue;//si occurence on passe à la suite
    }
   
    }
    if ($acces == true){    
  
        if (isset($_POST['rememberme'])) {
            // création de cookies pour 1 an 
            $tmp = setcookie('username', "alicia", time()+60*60*24*365);
            die('test : ' . $tmp);
            setcookie('password', $_POST['password'], time()+60*60*24*365, '/', 'localhost');
        
        } else {
           
            session_start();
            $_SESSION['log']=$username;
            $_SESSION['user']=$username;
            
            header('Location: index.php');
            exit;
        }
        //on ouvre une session pour envoyer un message d'erreur sur index.php
        session_start();
        $_SESSION['log']="<div class='alert alert-success' ><p>Log/mdp Valide</p></div>";
        header('Location: index.php');
        exit;
        
    } else {
        session_start();
        $_SESSION['log']="<div class='alert alert-danger' ><p>Log/mdp Invalide</p></div>";
        
       header('Location: index.php');
       exit;
    }
    
} else {
     session_start();
        $_SESSION['log']="<div class='alert alert-danger' ><p>Log/mdp vide</p></div>";
        
       header('Location: index.php');
       exit;
}

?>