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


    <div class="container" id='accueil'>

        <div class="row">
            <h1 class="col-12 text-center"> <?php echo $res['titre']; ?> </h1>
        </div>
        <div class="row">
            <div class="col-12 espace_message">
                <h1 class="background_message"> <?php echo $res['message']; ?> </h1>
            </div>
        </div>
        <div class="row">
            <img class="col-12 taille" class="" src="<?php echo $res['photo']; ?>" /> 
        </div>




        <div id="article" class="back_article container">

            <div class="row">

               

                    <div class="">
                        <div class="padding_contenu text-center padding police_titre show">
                            <h2 class="margin_titre"> "Entrer le Titre de l'article. le caca c'est délicieux parcz que ça sent bon"</h2>
                        </div>
                        <div class="">
                            <img class="flotte taille_photo" src="image/logokaamelott.jpg" alt="" />
                        </div>
                        <div class="padding_contenu text-center padding police_titre hidden">
                            <h2 class="margin_titre"> "Entrer le Titre de l'article. le caca c'est délicieux parcz que ça sent bon"</h2>
                        </div>
                        <div class="padding_contenu police">      
                            <p> ing and tpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard psu cle Ipsum is simply dummy text of the printing and tpsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard psu cle Ipsum is simply dummy text o </p>
                        </div>
                    </div>

            </div>

        </div>

<!-------------------------tripler l'article et sur mobile 1 article sur les autres devices 3 articles ---------------------------------------------------->
        <div class="row">
            <img class="col-12 taille"src=" <?php echo $res['image'] ?>" />
        </div>

        <div class="row">
            <iframe class="taille" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3978.7138331420456!2d1.5139166765459926!3d45.15924487717139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1505215294054" style="border:0" allowfullscreen></iframe>
        </div>

        <div class="row">
            <a class="col-6 offset-3 text-center" href=" <?php echo $res['reseaux'] ?>"> 
                <i class="fa fa-4x fa-facebook-square" aria-hidden="true" ></i> </a>
        </div>

    </div>







</body>


</html>
