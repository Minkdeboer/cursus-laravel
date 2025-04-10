const csrf_tokern = $('meta[name="csrf-token"]').attr('content');
const base_url = $('meta[name="base-url"]').attr('content');

function setAppearance(element) {
    let element = $(element);
    let color = element.data('data-color');
    let type = element.data('data-type');
    let id = element.data('data-id');
    $.ajax({
        method: 'POST',
        url: '', 
        data: {
            color: color,
            type: type,
            id: id
        },
        success: function (data) {},
        error: function (xhr, status, error) {}
    });
}

$(document).ready(function () {
  
});
