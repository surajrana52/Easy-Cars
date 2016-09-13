//*used jquery here
$(document).ready(function() {
    var form = $('#contactForm'); //form to be submited
    var submit = $('#subclicked'); //form submit button

    // form submit event
    $("form#contactForm").submit(function(ev) {
        ev.preventDefault();

        $.ajax({
            url: 'php/controller/contactHandler.php',
            type: 'POST',
            dataType: 'html', // request type html/json/xml
            data: form.serialize(), // serialize form data
            beforeSend: function() {
                submit.html('Processing...'); // change submit button text
            },
            success: function(data) {
                console.log(data);
                swal("Thank You", "You Enquiry Has Been Received!", "success")
                form.trigger('reset'); // reset form
                submit.hide();
                submit.prop("disabled", true);
                submit.html('DONE'); // reset submit button text
            },
            error: function(e) {
                console.log(e)
            }
        });
    });
});