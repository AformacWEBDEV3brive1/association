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

    <?php $tab = affiche_accueil(); ?>


        <div class="container" id='accueil'>
            <div class="row">
                <h1 class="col-12 text-center"> <?php echo $tab['site']['titre']; ?> </h1>
            </div>
            <div class="row">
            	<div id="hiddenMessage"><p> <?php echo $tab['site']['message']; ?> </p></div>
                <div class="col-12 espace_message">
                    <h2 id="typed" class="background_message"></h2>
                </div>
            </div>
            <div class="row margeBottom1">
                <img class="col-12 taille" src="<?php echo $tab['site']['image']; ?>" /> 
            </div>
            <div id="article" class="back_article container margeBottom1">
    			<h2>Les dernières nouvelles</h2>
    			<?php 
    			     $tabArticles = getArticles();
    			     $i =0;
    			     //print_r($tabArticles);
    			     foreach ($tabArticles as $article): ?>

                        <div id="<?php echo 'article' . $i;$i++; ?>" class="row">
                        	<div class="">
                        		<div class="padding_contenu text-center padding police_titre show">
                        			<h2 class="margin_titre"><?php echo $article[0]; ?></h2>
                        		</div>
                        		<div>
                        			<img class="flotte taille_photo" src="<?php echo $article[1]; ?>" alt="" />
                        		</div>
                        		<div class="padding_contenu text-center padding police_titre hidden">
                        			<h2 class="margin_titre"><?php echo $article[0]; ?></h2>
                        		</div>
                        		<div class="padding_contenu police">      
                        			<p><?php echo $article[2]; ?></p>
                        		</div>
                        		<div>      
                        			<p><?php echo date('d/m/y', $article[3]); ?></p>
                        		</div>
                        	</div>
                        </div>
    			
    			<?php endforeach; ?>
            </div>
    <!-------------------------tripler l'article et sur mobile 1 article sur les autres devices 3 articles ---------------------------------------------------->
            <div class="row margeBottom1">
                <img class="col-12 taille"src=" <?php echo $tab['carrousel'][1]['photo'] ?>" />
            </div>
                <div class="row">
                <a class="col-6 offset-3 text-center" href=" <?php echo $tab['reseaux'][0]['url'] ?>"> 
                    <i class="fa fa-4x fa-facebook-square" aria-hidden="true" ></i> </a>
            </div>
    	</div>
    	<div id="footer" class="container-fluid">
        	<iframe class="taille" src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3978.7138331420456!2d1.5139166765459926!3d45.15924487717139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1505215294054" style="border:0" allowfullscreen></iframe>
        </div>
        <script>
        var typed = new Typed('#typed', {
              stringsElement: '#hiddenMessage',
        	  typeSpeed: 30,
              showCursor: false
        	});
        </script>
	</body>
</html>
