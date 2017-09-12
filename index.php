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
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3978.7138331420456!2d1.5139166765459926!3d45.15924487717139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1505215294054" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            
            <a class="col-6 offset-3 text-center" href=" <?php echo $res['reseaux'] ?>"> 
                <i class="fa fa-4x fa-facebook-square" aria-hidden="true" ></i> </a>

        </div>

    </div>

    
    
        


</body>


</html>
