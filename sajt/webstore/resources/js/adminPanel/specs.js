$(document).ready(function(){

});

$(document).on('click', '.deleteSpec', function(){
    let specId = $(this).data('id');
    let categoryId = $(this).data('category');
    let row = $(this).closest('tr');
    let token = $('#csrf-token').val();

    $.ajax({
        url: '/admin/specifications/' + specId,
        type: 'POST',
        data: {
            _method: 'DELETE',
            _token: token,
            category_id: categoryId
        },
        success: function () {
            row.remove();
        },
        error: function (message) {
            console.log(message);
        }
    });
});
