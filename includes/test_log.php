<?php
if ($_SESSION['log'] == null) {
    session_destroy();
     header('Location: index.php');
     exit;
     
    } else if ($_SESSION['log'] == "<div class='alert alert-danger' ><p>Log/mdp Invalide</p></div>") {
        echo $_SESSION['log'];
        session_destroy();
       header('Location: index.php');
       exit;
       
    } else {
        
        $_SESSION['log'];
        
        ?>
       <script>
       afficher();
       </script>       
       <?php
    }
  

?>