
/*Utilisation de la librairie bootstrap-datepicker pour l'affichage des calendriers dans le formulaire d'ajout d'un membre*/
$(document).ready(function () {
    $("#dateInscription").datepicker();
    $("#dateNaissance").datepicker();
    
});


function generate_tableau() {

    $.ajax({url: '/association/includes/list_process.php',
        type: 'post',
        data: {info: 'liste'},
        // info est défini dans information.php, c'est une variable qui va chercher ce que l'ajax doit afficher,
        // ici la fonction getTime coté serveur
        success: function (output) { //les 2 mots dans les parenthèses doit être les mêmes.
            $(".tableau").append(output);
            // .heure est le nom de la class <p> où s'affiche l'heure       
        }

    });

}


function generate_filtres() {
    $.ajax({url: '/association/includes/list_process.php',
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
        error: function (xhr, thrownError) {
            alert(xhr.status);
            alert(thrownError);

        }
    });

}


function user_delete() {

    $.ajax({url: '/association/includes/add_member.php',
        type: 'post',
        data: {info: 'user_delete',
            recup: $('#inlineFormInputGroup').val()
        },
        success: function (output) {
            $("#supprimer").html(output);

        }

    });
}

//genere l'accueil

function generate_accueil() {

    $.ajax({url: '/association/includes/accueil_site.php',
        type: 'post',
        data: {info: 'affiche_accueil'},
        success: function (output) {
            $("#accueil").html(output);
        }

    });

}
function afficher(){
    $(".nav-link").addClass("visible");
    $(".nav-link,.visible").removeClass("cache");
    $(".form-control").addClass("cache");
    $(".form-control").removeClass("visible");

}
function cacher(){
    $(".visible").addClass("cache");
    $(".visible").removeClass("visible");
    $(".form-control").addClass("visible");
    $(".form-control").removeClass("cache");

}




