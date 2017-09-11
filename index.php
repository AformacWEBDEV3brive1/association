<?php
include 'includes/header.php'; // inclusion de l'header dans toute les pages.
?>


<body onload="generate_accueil()">
    <?php
    include 'includes/nav_bar.php'; // inclusion de la la nav bar dans toute les pages.
        
    if ($_SESSION['log'] == null) {
        session_destroy();
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
        // on detruit la session aprés reception du message.
    } else {
        $_SESSION['log'];
        ?>
       <script>
       afficher();
       </script>       
       <?php
    }
    
    ?>

    <div id='accueil'></div>

</body>


</html>
