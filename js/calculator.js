/* log alert */

$('#alert').hide();

/* click on table */

$('.mt_td').on('click', function(){
    // get variables
    var factor1 = $(this).data('factor1');
    var factor2 = $(this).data('factor2');
    var result = factor1 * factor2;
    // fill modal text with result
    $('#modal-txt').text(factor1 + ' × ' + factor2 + ' = ' + result);
    // show modal
    $('#exampleModal').modal('show');
    // fill form fields with values
    $('#factor1').val(factor1);
    $('#factor2').val(factor2);
    $('#result').val(result);
});

/* submit form to log data from table */

$('#mt_log').on('submit', function (e) {
	e.preventDefault();
    e.stopPropagation();
    // hide modal
    $('#exampleModal').modal('hide');
    // hide alert
    $('#alert').hide();
	// collect data from form
    var data = $(this).serializeArray();
    //console.log(data);
    // ajax
	$.ajax({
		headers: {

		},
		type: 'POST',
		data: data,
		url: "ajax/calculator_log.php",
		dataType: 'json',
		async: true,
		cache: false,
		beforeSend: function (xhr) {

		},
		success: function (result, status, xhr) {
            //console.log(result);
            // show message
            if (result.error == 0) {
                $('#alert').fadeIn().delay(2000).fadeOut();
            }
		},
		error: function (xhr, status, error) {

		},
		complete: function (xhr, status) {

		}
	});
});