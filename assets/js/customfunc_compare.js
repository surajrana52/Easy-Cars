//checkbox code & compare url maker
$(document).ready(function() {
    $('#compareurl').bind('click', function(e){
        e.preventDefault();
    });
    if ($('input[type=checkbox]:checked').length == 2){
        $('#compareurl').html('COMPARE NOW : 2 CARS');
    }else if($('input[type=checkbox]:checked').length == 1){
        $('#compareurl').html('COMPARE (SELECT ONE MORE CAR) : 1 CARS');
    }else{
        $('#compareurl').html('COMPARE (SELECT CARS): 0 CARS');
    }
});
var $checkboxes;
$('input[type=checkbox]').on('click', function (e) {
    if ($('input[type=checkbox]:checked').length != 2){
        $('#compareurl').bind('click', function(e){
            e.preventDefault();
        });
    }
    if ($('input[type=checkbox]:checked').length == 2){
        $('#compareurl').html('COMPARE NOW : 2 CARS');
        $('#compareurl').unbind('click');
    }else if($('input[type=checkbox]:checked').length == 1){
        $('#compareurl').html('COMPARE (SELECT ONE MORE CAR) : 1 CARS');
    }else{
        $('#compareurl').html('COMPARE (SELECT CARS) : 0 CARS');
    }

    if ($('input[type=checkbox]:checked').length <= 2){
        $checkboxes = $('input:checkbox').change(storeuser);
    }
    if ($('input[type=checkbox]:checked').length > 2) {
        $(this).prop('checked', false);
        alert("allowed only 2");
    }
});
function storeuser() {
    var users = $checkboxes.map(function() {
        if(this.checked) return this.value;
    }).get().join('&carid_two=');
    $("#compareurl").attr("href", "compare.php?carid_one="+users)
}

////checkbox code & compare url maker End