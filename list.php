<?php
include 'includes/header.php';
?>
<body onload="generate_tableau()">

    <?php
    include 'includes/nav_bar.php';
    ?>
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
    <input type='text' id ="valeurs_filtre"/>
    <button type='submit' onclick="generate_filtres()" >Envoyer</button>
    <div class='container-fluid titre_colonne retour'>
       <!-- <div class='row'>

            <div class='offset-lg-2 col-2 col-lg-1 xxx' >NOM</div>
            <div class='col-1 col-lg-1 xxx' >PRENOM</div>
            <div class='col-2 col-lg-1 xxx' >NUMERO</div>
            <div class='col-2 col-lg-2 xxx'>EMAIL</div>
            <div class='col-2 col-lg-1 xxx' >DATE INSCRIPTION</div>
            <div class='col-2 col-lg-1 xxx' >DATE DE NAISSANCE</div>
            <div class='col-1 col-lg-1 xxx'>SEXE</div><div class='offset-lg-2'></div>

        </div>
    
    </div>-->
    <table class='tableau sortable'>
        <tr class="row">
            <th class='col-1 offset-lg-2 col-lg-1'>Nom</th>
            <th class='col-1 col-lg-1'>Prenom</th>
            <th class='col-2 col-lg-2'>Numero</th>
            <th class='col-2 col-lg-2 '>Email</th>
            <th class='col-2 col-lg-1'>DateI</th>
            <th class='col-2 col-lg-1'>DateN</th>
            <th class='col-1 col-lg-1'>Sexe</th>
            <th class='col-1 col-lg-1'>Details</th>
        </tr>
        
    </table> </div>
</body>
</html>
