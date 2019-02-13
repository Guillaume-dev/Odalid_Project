// Initialisation une fois la page chargée
jQuery(document).ready(function () {
    alternate();
    $("#desactive").hide();
});

function alternate() {
    //permet de modifier la valeur du label
    jQuery("#switch").click(function () {
        $("#actif").toggle();
        $("#desactive").toggle();
       
    });

}