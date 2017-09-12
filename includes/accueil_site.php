<?php

include '../parameters.php';

if (isset($_POST['info'])) {
    $info = $_POST['info'];
    $info();
}


//fonction qui affiche l'accueil pas fini .
function affiche_accueil() {
    $db = openBDD();
    $res = $db->query("SELECT * FROM `site`");
    /*
      while ($resAll = $res->fetch()) {
      $data = $resAll['titre'] . $resAll['image'] . $resAll['message']. $resAll['photo'] . $resAll['reseaux'];
      echo $data;
      }
     * */

    return $res->fetch();
}

?>
