$(document).ready(function () {

});

$(document).on('click', '.gallery-img', function () {

    let newSrc = $(this).attr('src');
    let newAlt = $(this).attr('alt');

    let mainImg = $('#mainImage');

    let currentSrc = mainImg.attr('src');
    let currentAlt = mainImg.attr('alt');

    mainImg.fadeOut(150, function () {
        mainImg.attr('src', newSrc).fadeIn(150);
    });
    mainImg.attr('alt', newAlt);

    $(this).attr('src', currentSrc);
    $(this).attr('alt', currentAlt);

    $('.gallery-img').removeClass('border-blue-700');
    $(this).addClass('border-blue-700');
});

//klik na dugme add to cart
$(document).on('click', '.addToCart', function(){
    let productID=$(this).data('id');
    let isLogged = $(this).data('session');

    if (isLogged==0) {
        window.location.href = "/login";
        return;
    }

    $.ajax({
        url: '/cart/add',
        type: 'POST',
        data:{
            product_id: productID,
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
            showToast(response.message || "Added to cart");
        },
        error:function(error){
            let message = error.responseJSON?.message;
            showToast(message);
        }
    });
});


