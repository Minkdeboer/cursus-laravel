const selectedContact = $('meta[name="setected_contact"]');

function FetchMessages() {
    let contactId = selectedContact.attr('content');
    $.ajax ({
        method: 'GET',
        url: '',
        data: {},
        beforeSend: function () {},
        succes: function (data) {},
        error: function (xhr, status, error) {}
    })

}

$(document).ready(function() {
   $('.contact').on('click', function() {
    let contactId = $(this).data('id');
    selectedContact.attr('content', contactId);
    console.log(selectedContact.attr('content'));
   })
});    