const selectedContact = $('meta[name="selected_contact"]');
const authId = $('meta[name="auth_id"]').attr('content');
const baseUrl = $('meta[name="base_url"]').attr('content');
const inbox = $('.messages ul');

function messageTemplate(text, className) {
    return `<li class="${className}"><img src="${baseUrl}" alt="" /><p>${text}</p></li>`;
}

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
            inbox.empty(); 
            data.messages.forEach(value => {
            if(value.form_id == contactId) {
            inbox.append(messageTemplate(value.message, 'sent'));
            }else{
            inbox.append(messageTemplate(value.message, 'replies'));
            }
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching messages:', error);
        }
    });

    scrollToBottom();
}

function sendMessage() {
    let contactId = selectedContact.attr('content');
    let formData = $('.message-form').serialize();
    let messageBox = $('.message-box');
    $.ajax({ 
        method: 'POST',
        url: baseUrl + '/send-message',
        data: formData + '&contact_id=' + contactId,
        beforeSend: function () {
           let message = messageBox.val();
           inbox.append(messageTemplate(message, 'replies'));
           messageBox.val(''); 
           scrollToBottom();
        },
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

function scrollToBottom() {
    $('.messages').stop().animate({
        scrollTop: $('.messages')[0].scrollHeight
    });
}

$(document).ready(function () {
    $('.contact').on('click', function () {
        let contactId = $(this).data('id');
        selectedContact.attr('content', contactId);

        $('.blank-wrap').addClass('d-none');

        fetchMessages();
    });

    $('.message-form').on('submit', function(e) {
        e.preventDefault();
        sendMessage();
    });
});

window.Echo.private('message.' + authId)
    .listen('SendMessageEvent', (e) => {
     if(e.from_id == selectedContact.attr('content')) {
  
     inbox.append(messageTemplate(e.text, 'sent'));
     scrollToBottom();
     }
});   

window.Echo.join('online')
    .here (users => {

     users.forEach(user => {
        let element = $(`.contact[data-id="${user.id}"]`)
        if (element.length > 0) {
            element.find('.contact-status').removeClass('offline')
            element.find('.contact-status').addClass('online');
        }else {
            element.find('.contact-status').removeClass('online')
            element.find('.contact-status').addClass('offline');
        }
       
       
     });

    //  $('.contact').each(function(){
    //     console.log($(this));
    //  })
    })
    .joining(user => {
        let element = $(`.contact[data-id="${user.id}"]`)
        element.find('.contact-status').removeClass('offline')
        element.find('.contact-status').addClass('online');

    })
    .leaving(user => {
        let element = $(`.contact[data-id="${user.id}"]`)
        element.find('.contact-status').removeClass('online')
        element.find('.contact-status').addClass('offline');
    })
        