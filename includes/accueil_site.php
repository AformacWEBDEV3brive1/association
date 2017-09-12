<?php

include '../parameters.php';
$info = $_POST['info'];
$info();


//fonction qui affiche l'accueil pas fini .
function affiche_accueil() {
    $db = openBDD();
    $res = $db->query("SELECT * FROM `site`");

    while ($resAll = $res->fetch()) {
        $data = "<h1 class='text-center'>" . $resAll['titre'] . "</h1><div><img src='" . $resAll['image'] . "'/></div><div>" . $resAll['message'] . "</div><div><img src='" . $resAll['photo'] . "' style='width:50%;'/></div><div><a href='" . $resAll['reseaux'] . "'><h1>FACEBOOK</h1></a></div>";
        echo $data;
    }
}

?>
