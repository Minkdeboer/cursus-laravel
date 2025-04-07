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
            setContactInfo(data.contact);    
        },
        error: function (xhr, status, error) {
            console.error('Error fetching messages:', error);
        }
    });
}

function sendMessage() {
    let contactId = selectedContact.attr('content');
    let formData = $('.message-form').serialize();
    $.ajax({ 
        method: 'POST',
        url: baseUrl + '/send-message',
        data: formData + '&contact_id=' + contactId,
        success: function() {
            console.log('Message sent successfully');
            fetchMessages();  // Optionally, re-fetch messages after sending one
        },
        error: function(xhr, status, error) {
            console.error('Error sending message:', error);
        },
    });
}

function setContactInfo(contact) {
    $('.contact-name').text(contact.name);
}

$(document).ready(function () {
    // When a contact is clicked, set the selected contact ID and fetch messages
    $('.contact').on('click', function () {
        let contactId = $(this).data('id');
        selectedContact.attr('content', contactId);
        fetchMessages();  // Fetch the messages for the selected contact
    });

    // Submit the message form
    $('.message-form').on('submit', function(e) {
        e.preventDefault();
        sendMessage();
    });
});
