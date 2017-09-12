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
        <div class="row" id='accueil'>

            <h1 class="col-12 text-center"> <?php echo $res['titre']; ?> </h1>

            <img class="col-12 taille_photo" class="image1" src="<?php echo $res['photo']; ?>" />
            <div class="col-12 espace_message">
                <h1 class="background_message"> <?php echo $res['message']; ?> </h1>
            </div>

            <img class="col-12 taille_photo"src=" <?php echo $res['image'] ?>" />
            
            <a class="col-6 offset-3 text-center" href=" <?php echo $res['reseaux'] ?>"> 
                <i class="fa fa-4x fa-facebook-square" aria-hidden="true" ></i> </a>

        </div>

    </div>

    
    
        


</body>


</html>
