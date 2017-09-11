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

    
    <form id="formulaire" method="post">
        <div id="question" class="container">
            <h1>Ajouter un membre</h1>
            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Nom: </label>
                <input id="nom" class="col-12 col-md-4" type="text" name="nom" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Prénom: </label>
                <input id="prenom" class="col-12 col-md-4" type="text" name="prenom" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Téléphone: </label>
                <input id="telephone" class="col-12 col-md-4" type="tel" name="telephone" />
                <div class="col-md-3"></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <label class="col-12 col-md-2">Mail: </label>
                <input id="mail" class="col-12 col-md-4" type="email" name="mail" />
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
                <select id="sexe" class="col-12 col-md-4" name="sexe">
                    <option value="M">Homme</option>
                    <option value="F">Femme</option>
                    <option value="Autre">Autre</option>
                </select>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <input id="envoyer" onclick="user_ajout()" class="offset-7 col-md-2" type="button" value="Valider"/>
            </div>
        </div>
    </form>


</body>
</html>
