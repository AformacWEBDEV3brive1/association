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

    <table class='tableau'></table> 

</body>
</html>
