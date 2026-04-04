$(document).ready(function(){
    updateCartTotal();
});

//uklanjanje jednog proizvoda iz korpe
$(document).on('click', '.removeFromCart', function(){
    let btn = $(this);
    let productID = btn.data('id');

    $.ajax({
        url: `/cart/item/${productID}`,
        type: 'DELETE',
        data:{
            product_id: productID,
            _token: $('#csrf-token').val()
        },
        success: function(response){

            showToast(response.message);

            // ukloni item
            btn.closest('.cart-item').remove();

            //  ako nema više item-a
            if ($('.cart-item').length === 0) {
                $('#cartContent').addClass('hidden');
                $('#emptyCart').removeClass('hidden');
            }
            updateCartTotal();
        }
    });

});

//uklanjanje cele korpe
$(document).on('click', "#clearCart", function(){
    let cartContent = $("#cartContent");

    $.ajax({
        url: `/cart/clear`,
        type: 'DELETE',
        data:{
            _token: $('#csrf-token').val()
        },
        success: function(response){

            showToast(response.message);

            // ukloni sve
            cartContent.addClass('hidden');

            //  ako nema više item-a
            $('#cartContent').addClass('hidden');
            $('#emptyCart').removeClass('hidden');


        }
    });

});

//povecavanje/smanjivanje quantity-a
$(document).on('change', ".cartProductQuantity", function(){
    let quantity=$(this).val();
    let productID=$(this).data('id');

    $.ajax({
        url:'cart/update-quantity',
        type:'POST',
        data:{
            _token: $('#csrf-token').val(),
            new_quantity:quantity,
            productID:productID
        },
        success:function(response){
            showToast(response.message);
            updateCartTotal();
        },
        error:function(error){
            let message = error.responseJSON?.message;
            showToast(message);
        }
    });
});

//update ukupne cene korpe
function updateCartTotal() {
    let total = 0;

    $('.cart-item').each(function(){
        let price = parseFloat($(this).data('price'));
        let quantity = parseInt($(this).find('.cartProductQuantity').val());

        if (!isNaN(price) && !isNaN(quantity))
            total += price * quantity;
    });
    $('#cartTotal').text(total.toFixed(2) + ' $');
}
