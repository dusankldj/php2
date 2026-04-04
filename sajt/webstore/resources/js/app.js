import './bootstrap';

// jQuery
import $ from 'jquery';
window.$ = window.jQuery = $;


//da li se zajebavati sa javascript-om i komplikovati sebi zivot...
import './basics.js';
import './carousels.js';
import './store.js';
import './product.js';
import './loginAndRegister.js';
import './cart.js';

//za adminPanel
import './adminPanel/adminBasics.js';
import './adminPanel/adminProduct.js';


//toaster
import { Toast } from "toaster-js";
import "toaster-js/default.scss";

window.showToast = (message, type = "success") => {
    new Toast(message);
};

//faq-pitanja efekat, smestiti negde
$(document).ready(function(){

    $(".faq-question").click(function(){

        let answer = $(this).next(".faq-answer");

        $(".faq-answer").not(answer).slideUp(200);

        answer.stop(true, true).slideToggle(200);

    });

});






