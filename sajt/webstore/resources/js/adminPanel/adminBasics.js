$(document).ready(function() {

    $('#menu-btn').click(function() {
        $('#mobile-menu').slideToggle();
        $(this).toggleClass('fa-bars fa-xmark');
    });

    // desktop account
    $("#acc-icon").click(function(e){
        e.stopPropagation();
        $("#user-menu").toggleClass("hidden");
    });

    // mobile account
    $("#acc-icon-mobile").click(function(e){
        e.stopPropagation();
        $("#user-menu-mobile").slideToggle();
    });

    // klik van zatvara sve
    $(document).click(function(){
        $("#user-menu").addClass("hidden");
        $("#user-menu-mobile").slideUp();
    });

});




