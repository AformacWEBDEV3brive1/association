<?php

include 'includes/header.php'; //inclusion de l'header dans toute les pages.
?>


<body onload="generate_accueil()">
    <?php
    include 'includes/nav_bar.php'; //inclusion de la la nav bar dans toute les pages.
     
    ?>
   <?php
   
    session_start();
    echo $_SESSION['mess_err'];
    session_destroy();
   //on detruit la session aprés reception du message.       
         
          
   ?>
    <div id='accueil'></div>
</body>


</html>
