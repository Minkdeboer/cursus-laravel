const csrf_tokern = $('meta[name="csrf_token"]').attr('content');
const base_url = $('meta[name="base-url"]').attr('content');

function setAppearance(element) {
    let color = element.data('data-color');
    let type = element.data('data-type');
    let id = element.data('data-id');
    $.ajax({
        method: 'POST',
        url: base_url + '/note/appearance', 
        data: {
            _token: csrf_tokern,
            color: color,
            type: type,
            id: id
        },
        success: function (data) {},
        error: function (xhr, status, error) {}
    });
}

$(document).ready(function () {
  $('.appearance').on('click', function () {
    console.log('clicked');
    setAppearance($(this));
  });
});
