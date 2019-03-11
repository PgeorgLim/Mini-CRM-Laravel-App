
//removing the phone element (button and input) upon clicking 'x' button
function removePhoneElement(el) {
    $(el).parent().prev().remove();
    $(el).parent().remove();
}

//adding a new phone
function addPhone(){
    //taking the phone number
    let phone_number = $("#phone");

    //append it to the 'customer-phones' div
    $(".customer-phones").append(
        '<div class="form-group col-md-4">\n' +
        '<input class="form-control" type="number" placeholder="Phone" name="phones[]" value="'+phone_number.val()+'">\n' +
        '</div>\n' +
        '<div class="form-group col-md-1">\n' +
        '<button type="button" class="btn btn-default remove-phone" title="Remove Phone" onclick="removePhoneElement(this)">' +
        '<i class="fas fa-times"></i>' +
        '</button> \n' +
        '</div>'
    );

    phone_number.val('');
}

function deleteCustomer(id) {
    event.preventDefault();

    //Submit the 'delete form' after confirmation
    if (confirm('Delete this customer?')){
        $(`#delete-form-${id}`).submit();
    }
}