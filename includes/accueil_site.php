<?php

$info = $_POST['info'];
$info();

function openBDD() {
    $BDD = new PDO('mysql:host=127.0.0.1;dbname=association;charset=utf8', 'root', '123456789$');
    return $BDD;
}
//fonction qui affiche l'accueil pas fini .
function affiche_accueil() {
    $db= openBDD();
    $res = $db->query("SELECT * FROM `site`");
    
        while ($resAll = $res->fetch()) {
        $data = "<h1 class='text-center'>".$resAll['titre']."</h1><div><img src='".$resAll['image']."'/></div><div>".$resAll['message']."</div><div><img src='".$resAll['photo']."' style='width:50%;'/></div><div><a href='".$resAll['reseaux']."'><h1>FACEBOOK</h1></a></div>";
        echo $data;

    }
    

}

?>