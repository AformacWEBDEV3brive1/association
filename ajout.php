<?php
include 'includes/header.php';

?>
<body>


    <?php
    include 'includes/nav_bar.php';
    include 'includes/test_log.php';
    ?>

    <div id="ajout"> 

    </div>

    
    <form id="formulaire" method="post" action="add_member.php">
        <div id="question" class="container">
            <h1>Ajouter un membre</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Nom: </label>
                <input class="col-12 col-md-4" type="text" name="nom" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Prénom: </label>
                <input class="col-12 col-md-4" type="text" name="prenom" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Téléphone: </label>
                <input class="col-12 col-md-4" type="tel" name="telephone" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Mail: </label>
                <input class="col-12 col-md-4" type="email" name="mail" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Date d'inscription: </label>
                <input id="dateInscription" class="col-12 col-md-4" type="text" name="date_inscription" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Date de naissance: </label>
                <input id="dateNaissance" class="col-12 col-md-4" type="text" name="date_naissance" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Sexe: </label>
                <select class="col-12 col-md-4" name="sexe">
                    <option value="M">Homme</option>
                    <option value="F">Femme</option>
                    <option value="Autre">Autre</option>
                </select>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <input id="envoyer" class="offset-7 col-md-2" type="submit" value="Valider"/>
            </div>
        </div>
    </form>


</body>
</html>
