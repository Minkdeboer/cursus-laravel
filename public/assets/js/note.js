const csrf_token = $('meta[name="csrf_token"]').attr('content');
const base_url = $('meta[name="base_url"]').attr('content');

function setAppearance(element) {
    let color = element.data('color');
    let type = element.data('type');
    let id = element.data('id');

    $.ajax({
        method: 'POST',
        url: base_url + '/note/appearance',
        data: {
            _token: csrf_token,
            color: color,
            type: type,
            id: id
        },
        success: function (data) {
            console.log('Appearance updated:', data);
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', error);
        }
    });
}

$(document).ready(function () {
    $('.appearance').on('click', function () {
        setAppearance($(this));
    });
});
