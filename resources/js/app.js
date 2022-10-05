import './bootstrap';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('.remove').on('click', function () {
        const url = $(this).data('url');
        const remove = $(this).data('remove');

        $.ajax({
            type: 'DELETE',
            url: url,
            success: function () {
                $('#' + remove).remove();
            }
        });
    });
});
