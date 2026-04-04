$(document).ready(function(){

    if($('#hasDiscount').is(':checked'))
        $('#discountWrapper').removeClass('hidden');


    // Toggle discount
    $('#hasDiscount').on('change', function(){
        if($(this).is(':checked'))
            $('#discountWrapper').removeClass('hidden');
        else $('#discountWrapper').addClass('hidden');
    });

    $(document).on('click', '.removeValue', function(){
        let input = $(this).closest('div').find('input[data-id]');
        input.val('');
    });


});


$('select[name="category"]').on('change', function () {
    let categoryId = $(this).val();
    if(categoryId == "default") return;

    $.ajax({
        url: '/category/' + categoryId + '/specs',
        method: 'GET',
        success: function (response) {
            let html = '';
            response.forEach(spec => {
                html += `
                    <div class="flex items-center gap-2 bg-gray-50 p-3 rounded-xl shadow-sm">

                        <input type="text"
                               value="${spec.name}"
                               disabled
                               class="w-1/3 bg-gray-200 text-blue-700 font-bold border rounded-lg p-2 cursor-not-allowed">

                        <input type="text"
                               name="spec_value[${spec.id}]"
                               class="flex-1 border rounded-lg p-2 text-blue-700 font-bold focus:ring-2 focus:ring-blue-400 outline-none">

                        <button type="button"
                                class="removeValue text-red-500 hover:text-red-700 text-lg">
                            <i class="fa fa-times"></i>
                        </button>

                    </div>
                `;
            });

            $('#specContainer').html(html);
        }
    });

});

//brisanje slike
$(document).on('click', '.deleteImage', function () {
    let element = $(this);
    let image_id = $(this).data('id');
    let token = $('#csrf_token').val();

    $.ajax({
        url: '/admin/image/delete-image',
        method: 'DELETE',
        data: {
            image_id: image_id
        },
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function(response){
            console.log(response);
            element.closest('.group').remove();
        },
        error: function(error){
            showToast(error.responseJSON["message"]);
        }
    });
});

//make a thumbnail
$(document).on('click', '.changeThumbnail', function () {
    let element=$(this);
    let image_id = $(this).data('id');
    let token = $('#csrf_token').val();

    $.ajax({
        url: '/admin/image/change-thumbnail',
        method: 'PATCH',
        data: {
            image_id: image_id
        },
        headers: {
            'X-CSRF-TOKEN': token
        },
        success: function(response){
            let newId = response.new_thumbnail_id;

            $('.changeThumbnail').removeClass('hidden');

            $('.changeThumbnail').each(function(){
                if(element.data('id') == newId)
                    element.addClass('hidden');
            });
        },
        error: function(error){
            showToast(error.responseText.message);
        }
    });

});
