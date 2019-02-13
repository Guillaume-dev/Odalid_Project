// Initialisation une fois la page chargée
jQuery(document).ready(function(){
    lancer();
});

// fonction se lance au chargement de la page
function lancer() {
    // recherche dynamique avec mise a jour du contenu et de la pagination
    jQuery('#nom').on("keyup", function(e){
        url = $(this).attr('href');
        verification(url);
    });

    // on charge la mise a jour des données lors d'un clic sur la pagination
    $('body').on('click', '.pagination a', function(e){
        e.preventDefault();
        url = $(this).attr('href');
        verification(url);
        console.log(url);
        window.history.pushState("", "", url);
    });

    //on verifie l'url pour charger le bon contenu et pagination en fonction de la page/recherche demandée
    function verification(url) {
        alldata = "recherche=" + $('#nom').val();
        console.log(alldata);
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'html',
            data: {_token : $('input[name=_token]').val(), recherche: $('#nom').val()},
            success: function (historiques) {
                //mise a jour des donnees -> vue historiqueLoad
                $('#histo').html(historiques);
            },
            error: function (err1, err2, err3) {
                console.log(err1);
                console.log(err2);
                console.log(err3);
                //alert("error" + alldata);
            },
        });
    }
    
}