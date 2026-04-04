$(document).ready(function(){

});

$(document).on('click', ".deleteCategory", function(e){
    e.preventDefault();
    let categoryID=$(this).data('id');
    let parent=$(this).data('parent');
    let element=$(this).closest('.bg-white');
    let token = $('#csrf-token').val();

    $.ajax({
        url: '/admin/category/' + categoryID,
        type: 'POST',
        data: {
            _method: 'DELETE',
            _token: token,
            is_parent: parent
        },
        success: function () {
            if (parent == true || parent == 'true')
                element.remove();
            else $(e.target).closest('tr').remove();

        },
        error: function (err) {
            alert('Error deleting category');
        }
    });
});
