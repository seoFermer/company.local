import './bootstrap';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function () {
    $('.btn-remove').on('click', function () {
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

    $('.btn-detach').on('click', function () {
        const url = $(this).data('url');
        const remove = $(this).data('remove');
        const id = $(this).data('id');

        $.ajax({
            type: 'POST',
            url: url,
            data: {
                id
            },
            success: function () {
                $('#' + remove).remove();
            }
        });
    });
});
