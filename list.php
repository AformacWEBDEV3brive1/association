<?php
include 'includes/header.php';
?>
<body onload="generate_tableau()">

    <?php
    include 'includes/nav_bar.php';
    ?>
    <div>
        <select id="selection">
            <option value='nom'>
                Nom
            </option>
            <option value='prenom'>
                Prenom
            </option>
            <option value='role'>
                Role
            </option>
            <option value='statut'>
                Statut
            </option>
        </select>
        <input type='text' id ="valeurs_filtre">
        <button type='submit'onclick="generate_filtres()"> Envoyer </button>
    </div>

    <div>
        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
            <div class="input-group-addon">@</div>
            <input type="text" id="inlineFormInputGroup" placeholder=" Mail"> 
            <button type="submit" id="supprimer" onclick="user_delete()"> Supprimer </button>
        </div>
    </div>

    <div class='container titre_colonne retour'>
        <div class='row'>

            <div class='offset-lg-2 col-2 col-lg-1 xxx' >NOM</div>
            <div class='col-1 col-lg-1 xxx' >PRENOM</div>
            <div class='col-2 col-lg-1 xxx' >NUMERO</div>
            <div class='col-2 col-lg-2 xxx'>EMAIL</div>
            <div class='col-2 col-lg-1 xxx' >DATE INSCRIPTION</div>
            <div class='col-2 col-lg-1 xxx' >DATE DE NAISSANCE</div>
            <div class='col-1 col-lg-1 xxx'>SEXE</div><div class='offset-lg-2'></div>

        </div>
    </div>


    <div class='tableau'></div> 
</body>
</html>
