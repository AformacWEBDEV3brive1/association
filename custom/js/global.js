
/*Utilisation de la librairie bootstrap-datepicker pour l'affichage des calendriers dans le formulaire d'ajout d'un membre*/
$(document).ready(function () {
    $("#dateInscription").datepicker();
    $("#dateNaissance").datepicker();
});


function generate_tableau() {

    $.ajax({url: '/association/includes/list_process.php',
        type: 'post',
        data: {info: 'liste'},
        success: function (output) {
            $(".tableauBody").append(output);
            $('.trash').click(function () {//ajoute fonction click sur les poubelles
                if (confirm('Voulez-vous supprimer cet utilisateur ?')) {
                    var trash = '.' + this.classList[4] + '.email';//Selectionne la même classe que celle de la poubelle (en position [4]) et .email
                    user_delete($(trash).html());
                }
            });
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
            $(".tableauBody").html(output);
            $('.trash').click(function () {//ajoute fonction click sur les poubelles
                if (confirm('Voulez-vous supprimer cet utilisateur ?')) {
                    var trash = '.' + this.classList[4] + '.email';//Selectionne la même classe que celle de la poubelle (en position [4]) et .email
                    user_delete($(trash).html());
                }
            });
        },
        error: function (xhr, thrownError) {
            alert(xhr.status);
            alert(thrownError);

        }
    });

}

function user_ajout() {
    var dateI = ($('#dateInscription').data('datepicker').dates[0].getTime()) / 1000;
    var dateN = ($('#dateNaissance').data('datepicker').dates[0].getTime()) / 1000;

    $.ajax({url: 'includes/add_member.php',
        type: 'post',
        data: {info: 'getForm',
            log: $('#log').val(),
            nom: $('#nom').val(),
            prenom: $('#prenom').val(),
            mdp: $('#mdp').val(),
            telephone: $('#telephone').val(),
            mail: $('#mail').val(),
            dateI: dateI,
            dateN: dateN,
            sexe: $('#sexe').val(),
            role: $('#role').val(),
            status: $('#status').val()
        },
        success: function (output) {
            //alert("succes!");
            $("#ajout").html(output);
            $("#formulaire").trigger("reset");

        },
        error: function (xhr, thrownError) {
            alert("Erreur   " + "xhr.status: " + xhr.status + "   xhr.responseText: " + xhr.responseText + "   xhr.readyState: " + xhr.readyState + "   thrownError: " + thrownError);
        }


    });
}


function user_delete(mail) {

    $.ajax({url: '/association/includes/add_member.php',
        type: 'post',
        data: {info: 'user_delete',
            mail: mail
        },
        success: function () {
            $('.tableauBody').empty();//on vide le tableau
            generate_tableau();// puis on regenere
        }

    });
}


//genere l'accueil. Non utilisée, a virer.
function generate_accueil() {

    $.ajax({url: '/association/includes/accueil_site.php',
        type: 'post',
        data: {info: 'affiche_accueil'},
        success: function (output) {
            $("#accueil").html(output);
        }
    });

}

function afficher() {
    $(".nav-link").addClass("visible");
    $(".nav-link,.visible").removeClass("cache");
    $(".form-control").addClass("cache");
    $(".form-control").removeClass("visible");

}

function cacher() {
    $(".visible").addClass("cache");
    $(".visible").removeClass("visible");
    $(".form-control").addClass("visible");
    $(".form-control").removeClass("cache");

}





