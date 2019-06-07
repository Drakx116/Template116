// DANS LA PARTIE AJOUT DE COMPTE DE L'ADMINISTRATION, MONTRE LE BON FORMULAIRE A REMPLIR

$("#new-user").click(function(){
    $("#add-admin-form").hide();
    $("#add-user-form").show();
});

$("#new-admin").click(function(){
    $("#add-admin-form").show();
    $("#add-user-form").hide();
});