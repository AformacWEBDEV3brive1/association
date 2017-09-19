<?php

include 'parameters.php';

if (isset($_POST['info'])) {
    $info = $_POST['info'];
    $info();
}


//fonction qui affiche l'accueil pas fini .
function affiche_accueil() {
    $db = openBDD();
    $res = $db->query("SELECT * FROM `site`;")->fetch();
    $res2 = $db->query("SELECT photo FROM `carrousel`;")->fetchAll();
    $res3 = $db->query("SELECT url FROM `reseaux`")->fetchAll();
    $tab = array('site'=>$res, 'carrousel'=>$res2, 'reseaux'=>$res3);
    //echo '<pre>'.print_r($tab,true).'</pre>';
    
    /*
      while ($resAll = $res->fetch()) {
      $data = $resAll['titre'] . $resAll['image'] . $resAll['message']. $resAll['photo'] . $resAll['reseaux'];
      echo $data;
      }
     * */

    return $tab;
}

function getArticles(){
    $db = openBDD();
    $articles = $db->query("SELECT * FROM news ORDER BY date DESC");
    return $articles->fetchAll();
}
?>
