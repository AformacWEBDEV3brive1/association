<?php
include 'includes/header.php'; //inclusion de l'header dans toute les pages.
include 'includes/accueil_site.php';
include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.
?>
<body>
    <?php
    

    //on detruit la session aprés reception du message. 
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

    <?php $res = affiche_accueil(); ?>

    <div class="container">
        <div id='accueil'>
            
            <h1 class="text-center"> <?php echo $res['titre']; ?> </h1>
            
            <img class="taille_photo" src="<?php echo $res['photo']; ?>" />
            <div class="espace_message">
            <h1 class="background_message"> <?php echo $res['message']; ?> </h1>
            </div>
            
            <img class="taille_photo"src=" <?php echo $res['image'] ?>" />
            
            <a href=" <?php echo $res['reseaux'] ?> "> Facebook </a>
            

        </div>
    </div>
    
    
        


</body>


</html>
