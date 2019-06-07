// EN FONCTION DE L'ETAT DE LA CHECKBOX, ON MONTRE OU CACHE LE MENU DEROULANT CONTENANT LES DIFFERENTS SECTEURS D'ACTIVITE

$("#check-job").change(function(){
    if(!$(this).prop("checked"))
    {
        $("#hide-select").hide();
    }
    else
    {
        $("#hide-select").show();
    }
});