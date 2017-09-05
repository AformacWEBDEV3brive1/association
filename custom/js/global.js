/*Utilisation de la librairie bootstrap-datepicker pour l'affichage des calendriers dans le formulaire d'ajout d'un membre*/
$(document).ready(function() {
    $("#dateInscription").datepicker();
    $("#dateNaissance").datepicker();
    
    $(function(){
        //alert("test");
        $('button[name=buttonDetails]').click(function(){
           //alert($(this).attr("id"));
           generate_pagedetaillee($(this).attr("id"));
        });
    });
});


function generate_tableau() {
        $.ajax({url:'/association/includes/list_process.php',
            type: 'post',
            data: {info: 'liste'},
            // info est défini dans information.php, c'est une variable qui va chercher ce que l'ajax doit afficher,
            // ici la fonction getTime coté serveur
            success: function (output) { //les 2 mots dans les parenthèses doit être les mêmes.
                $(".tableau").html(output);
                // .heure est le nom de la class <p> où s'affiche l'heure       
            }

        });

}

function generate_filtres() {
        $.ajax({url:'/association/includes/list_process.php',
            type: 'post',
            data: {info: 'filter_nom_prenom',
                filter: $('#selection').val(),
                value: $('#valeurs_filtre').val()
                },
            // info est défini dans information.php, c'est une variable qui va chercher ce que l'ajax doit afficher,
            // ici la fonction getTime coté serveur
            success: function (output) { //les 2 mots dans les parenthèses doit être les mêmes.
                $(".tableau").html(output);
                     
            },
            error: function (xhr, thrownError){
                        alert(xhr.status);
        alert(thrownError);

            }        
        });

}

function generate_pagedetaillee(mail) {
        $.ajax({
                url:'/association/includes/list_process.php',
                type: 'post',
                data: {info: 'pageDetaillee', mail: mail},
                success: function (output) {
                $(".tableau").html(output);   
            }
        });
}