//fix Google Chrome not showing required validation for car type (CHROME BUG: Cant focus)

function cartypevald() {
    var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
    if (is_chrome) {
        if (!$('[name="cartype"]').is(':checked')) {
            return false;
        }
    }else {
        return true;
    }
}

//*used jquery here
$(document).ready(function() {
    var form = $('#form1-subsc'); //form to be submited
    var submit = $('#subscribe'); //form submit button

    // form submit event
    $("form#form1-subsc").submit(function(ev) {
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
                swal("Subscribed", "Thank You for Subscribing!", "success")
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