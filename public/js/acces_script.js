jQuery(document).ready(function () {
    granted();
  
});

function granted() {
    //permet de modifier la valeur du label
    jQuery("#no_acces").click(function () {
        $("#config").hide();
        console.log('hideme');
    });

    jQuery("#acces").click(function () {
        $("#config").show();
        console.log('showme');
    });
}

