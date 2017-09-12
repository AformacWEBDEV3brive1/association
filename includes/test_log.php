<?php 
if ($_SESSION['log'] == null) {
    session_destroy();
   // header('Location: index.php');exit;
    ?>
       <script>
       cacher();
       </script>       
       <?php
    } else if ($_SESSION['log'] == "<div class='alert alert-danger' ><p>Log/mdp Invalide</p></div>") {
        echo $_SESSION['log'];
        ?>
       <script>
       cacher();
       </script>       
       <?php
        session_destroy();
       // header('Location: index.php');   exit;
       
    } else {
        $_SESSION['log'];
        
        ?>
       <script>
       afficher();
       </script>       
       <?php
    }

?>