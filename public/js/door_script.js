// Initialisation une fois la page chargée
jQuery(document).ready(function () {
    alternate();
    $("#opened").hide();
});

function alternate() {
    //permet de modifier la valeur du label
    jQuery("#open").click(function () {
        $("#opened").show();
        $("#closed").hide();
       
    });

    jQuery("#close").click(function () {
        $("#opened").hide();
        $("#closed").show();
      
    });
}
