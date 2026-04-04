// jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;

//ovo je js fajl za osnovne funkcionalnosti koje ce biti potrebne na svakoj stranici
//npr hamburger nav meni funkcionalnost, trenutna godina u footer-u...

//on load
$(document).ready(function(){
    let currentYear=new Date().getFullYear();
    $("#currentYear").append(currentYear);
});

//promena hamburgera u x ikonicu
$('#hamburgerBtn').on('click', function () {
    $('#mobileMenu').toggleClass('max-h-0 max-h-96');
    $(this).find('i').toggleClass('fa-bars fa-xmark');
});


// Kada se pređe na desktop, resetuj meni
$(window).on('resize', function () {
    if ($(window).width() >= 768) {
        $('#mobileMenu').hide();
    }
});

//keyup event na search field
$(document).on("keyup", "#search", function(){
    let string=$("#search").val().trim();

    if(string.length>3){

    }
});

//hover na kategoriju u aside-u
$(document).ready(function () {
    $('.menu-item').hover(
        function () {
            $(this).find('.submenu')
                .stop(true, true)
                .slideDown(200);
        },
        function () {
            $(this).find('.submenu')
                .stop(true, true)
                .slideUp(200);
        }
    );
});

//klik na ikonicu account
$("#user-icon").click(function(e){
    e.stopPropagation();
    $("#user-menu").toggleClass("hidden");
});

// zatvori dropdown ako se klikne van njega
$(document).click(function(){
    $("#user-menu").addClass("hidden");
});
