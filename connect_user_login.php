


<?php
/* These are our valid username and passwords */
$user = "alicia";
$pass = "motdepasse";

if (isset($_POST['log']) && isset($_POST['mdp'])) {
    
    if (($_POST['log'] == $user) && ($_POST['mdp'] == $pass)) {    
        
       
            /* Set cookie to last 1 year */
            setcookie('username', $_POST['username'], time()+60*60*24*365, '/account', 'www.example.com');
            setcookie('password', md5($_POST['password']), time()+60*60*24*365, '/account', 'www.example.com');
        
       
           
        }
        header('Location: index.php');
        
    } else {
        echo 'Username/Password Invalid';
    }
    
} else {
    echo 'You must supply a username and password.';
}
?>