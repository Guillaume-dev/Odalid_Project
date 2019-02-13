// Initialisation une fois la page chargée
jQuery(document).ready(function () {
    modif();
    annuler();
});

function modif() {
    //permet d'activer le formulaire de modification
    jQuery('#editUser').click(function () {
        $("input").prop('disabled', false);
    });
    
    jQuery('#editBadge').click(function () {
        $("input").prop('disabled', false);
    });
    
    jQuery('#editSalle').click(function () {
        $("input").prop('disabled', false);
    });
    
     jQuery('#editZone').click(function () {
        $("input").prop('disabled', false);
    });
    
     jQuery('#editPorte').click(function () {
        $("input").prop('disabled', false);
    });
}

function annuler() {
    //permet de désactiver le formulaire de modification
    jQuery('#disabled').click(function () {
        $("input").prop('disabled', true);
    });
}

function keepCo() {
    $('#toggle-two').bootstrapToggle({
      on: 'Oui',
      off: 'Non'
    });
  })