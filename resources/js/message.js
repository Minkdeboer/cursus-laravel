const selectedContact = $('meta[name="selected_contact"]');
const baseUrl = $('meta[name="base_url"]').attr('content');

function fetchMessages() {
    let contactId = selectedContact.attr('content');

    $.ajax({
        method: 'GET',
        url: baseUrl + '/fetch-messages',
        data: {
            contact_id: contactId
        },
        beforeSend: function () {
            console.log('Fetching messages...');
        },
        success: function (data) {
            console.log('Messages received:', data);
            // You can update the DOM with messages here
        },
        error: function (xhr, status, error) {
            console.error('Error fetching messages:', error);
        }
    });
}

$(document).ready(function () {
    $('.contact').on('click', function () {
        let contactId = $(this).data('id');
        selectedContact.attr('content', contactId);
        fetchMessages();
    });
});
