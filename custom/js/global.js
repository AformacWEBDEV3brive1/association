/*Utilisation de la librairie bootstrap-datepicker pour l'affichage des calendriers dans le formulaire d'ajout d'un membre*/
$(document).ready(function() {
    $("#dateInscription").datepicker();
    $("#dateNaissance").datepicker();
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
   alert($('#selection').val());
        $.ajax({url:'/association/includes/list_process.php',
            type: 'post',
            data: {info: 'filter_nom_prenom',
                filter: $('#selection').val(),
                value: $('#valeurs_filtre')
                },
            // info est défini dans information.php, c'est une variable qui va chercher ce que l'ajax doit afficher,
            // ici la fonction getTime coté serveur
            success: function (output) { //les 2 mots dans les parenthèses doit être les mêmes.
                $(".tableau").html(output);
                // .heure est le nom de la class <p> où s'affiche l'heure       
            }

        });

}