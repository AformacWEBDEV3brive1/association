<?php
include 'includes/header.php'; //inclusion de l'header dans toute les pages.
include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.
include 'includes/accueil_site.php';
include 'includes/test_log.php';

?>


<body>
    
    <?php $tab = affiche_accueil();?>

   
    <form id="formulaire" action="includes/interface_admin_process.php" method="post">
        <div id="Administration" class="container">

            <h3> Accueil: </h3>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Titre: </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control" name="titre"><?php echo $tab['site']['titre']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Message: </label>                
                <textarea  id="nom" class="col-12 col-md-4 form-control" name="message"><?php echo $tab['site']['message']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Image_principale: </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control" name="image_principale"><?php echo $tab['site']['image']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2"> Image_secondaire: </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control" name="image_secondaire"><?php echo $tab['carrousel'][1]['photo']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2"> Facebook (URL): </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control" name="reseaux"><?php echo $tab['reseaux'][0]['url']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <h3>Article:</h3>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Titre: </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control"><?php echo $res['']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Image: </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control"><?php echo $res['']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Contenu: </label>
                <textarea  id="nom" class="col-12 col-md-4 form-control"><?php echo $res['']; ?></textarea>
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-5 "></div>
                <button type="submit" class="btn btn-primary"> Valider </button>
                <div class="col-md-5"></div>
            </div>



        </div>

    </form>




</body>
































