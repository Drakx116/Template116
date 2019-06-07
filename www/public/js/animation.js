// ANIMATIONS DE LA BARRE DE NAVIGATION

$(window).resize(function() {
    var width = $(window).width();
    if(width > 1200) {
        $(".navbar-toggle-button").css({"display" : "none"});
        $('.navbar-items').css({"display" : "block"});
    }
    else {
        $("#toggle-btn").css({"display" : "inline"});
    }
});

$("#toggle-btn").click(function(){
    $(".navbar-items").slideToggle();
});