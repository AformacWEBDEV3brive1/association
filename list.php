<?php


include 'includes/header.php';

?>
<body onload="generate_tableau()">

    <?php
    include 'includes/nav_bar.php';
    include 'includes/test_log.php';
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
        <div class='container titre_colonne retour'>
            <!-- remplacement de l'ancienne div par une table pour pouvoir utiliser facilement la librairie sorttable-->
            <table class='tableau sortable col-lg-12'>
                <thead>
                <tr class="row">
                    <th class='col-2 col-md-1 col-lg-1 nom'>Nom</th>
                    <th class='col-2 col-md-1 col-lg-1'>Prenom</th>
                    <th class='col-md-2 numb col-lg-2'>Numero</th>
                    <th class='col-md-3 email col-lg-2'>Email</th>
                    <th class='col-3 col-md-2 col-lg-2'>Inscription</th>
                    <th class=' dateN'>DateN</th>
                    <th class=' sexe'>Sexe</th>
                    <th class='col-md-1 age col-lg-1'>Age</th>
                    <th class='col-5 col-md-2 col-lg-3 actions'>Actions</th>
                   
                </tr>
                </thead>
                <tbody class='tableauBody'><!--Ajout <tbody> <thead> afin de structurer la table et d'avoir un <tbody> qu'on puisse utiliser normalement-->
                    
                </tbody>
            </table>
        </div>
</body>
</html>
