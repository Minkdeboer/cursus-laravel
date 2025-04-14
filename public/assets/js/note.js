const csrf_token = $('meta[name="csrf-token"]').attr('content');
const base_url = $('meta[name="base_url"]').attr('content');

function setAppearance(element) {
    let color = element.data('color');
    let image = element.data('image');
    let type = element.data('type');
    let id = element.data('id');

    $.ajax({
        method: 'POST',
        url: base_url + '/note/appearance',
        data: {
            _token: csrf_token,
            color: color,
            image: image,
            type: type,
            id: id
        },
        success: function (data) {
            console.log('Appearance updated:', data);
        },
        error: function (error) {
            console.error('AJAX error:', error);
        }
    });
}

$(document).ready(function () {
    $('.appearance').on('click', function () {
        $(this).closest('.single_note').css('background-color', $(this).attr('data-color'));
        setAppearance($(this));
    });
});
