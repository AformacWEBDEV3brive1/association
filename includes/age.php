  <?php 
    function birthday_to_age($date_de_naissance){
        $date_a= time();
        
        $age=$date_a-$date_de_naissance;
        $date_age = (((($age/60)/60)/24)/365);
        $age_vrai= floor($date_age);
        return $age_vrai;
    }
    ?>