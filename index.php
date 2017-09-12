<?php
include 'includes/header.php'; //inclusion de l'header dans toute les pages.
include 'includes/accueil_site.php';
?>


<!--<body onload="generate_accueil()">-->
<body>
    <?php
    include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.

    session_start();
    echo $_SESSION['mess_err'];
    session_destroy();
    //on detruit la session aprés reception du message.
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
