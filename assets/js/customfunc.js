$(document).ready(function() {
    var form = $('#emicalc'); //form to be submited
    $("form#emicalc").submit(function(ev) {
        ev.preventDefault();


        var car_amount = $('#lamt').val();
        var down_pay = $('#dpay').val();
        var loan_term = $('#term').val();
        var annual_interest= $('#interest').val();

        if(car_amount != 0){

            car_amount = parseFloat(car_amount);
            down_pay   = parseFloat(down_pay);
            loan_term  = parseFloat(loan_term);
            annual_interest = parseFloat(annual_interest);

            if (down_pay<= car_amount){

                var p = car_amount - down_pay;
                var r = annual_interest / 1200;
                var part1 = Math.pow((1 + r), loan_term);
                var part2 = p * r * part1;
                var part3 = part1 - 1;
                var emi = Math.round(100 * (part2 / part3)) / 100;
                $("#emi-cal-res").html(emi);
                var tamt = Math.round(100 * emi * loan_term) / 100;
                $("#emi-cal-res2").html(tamt);
                var tip = Math.round(100 * (tamt - p)) / 100;
                $("#emi-cal-res1").html(tip);
            }
        }

    });
});

function resetemi(){
    var form = $('#emicalc'); //form
    form.trigger('reset'); // reset form
    $("#emi-cal-res").html('');
    $("#emi-cal-res2").html('');
    $("#emi-cal-res1").html('');
}

//*used jquery here
$(document).ready(function() {
  var form = $('#form1-one'); //form to be submited
	var submit = $('#gebut'); //form submit button	

  // form submit event
 $("form#form1-one").submit(function(ev) {
    ev.preventDefault();

    $.ajax({
	    url: 'php/controller/enquiryHandler.php',
        type: 'POST',
        dataType: 'html', // request type html/json/xml
        data: form.serialize(), // serialize form data
        beforeSend: function() {
            submit.html('Processing...'); // change submit button text
        },
        success: function(data) {
            console.log(data);
			swal("Enquiry submitted!", "Seller will get in touch with you soon", "success")
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

//*used jquery here
$(document).ready(function() {
  var form = $('#form2'); //form to be submited
	var submit = $('#stdbut'); //form submit button	

  // form submit event
 $("form#form2").submit(function(ev) {
    ev.preventDefault();

    $.ajax({
	    url: 'php/controller/enquiryHandler.php',
        type: 'POST',
        dataType: 'html', // request type html/json/xml
        data: form.serialize(), // serialize form data
        beforeSend: function() {
            submit.html('Processing...'); // change submit button text
        },
        success: function(data) {
            console.log(data);
			swal("Enquiry submitted2!", "Seller will get in touch with you soon", "success")
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

