$(document).ready(function() {
	$('#reser-button').on('click', function() {
		var URL = $(this).attr('data-url');
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: URL,
			type: 'post',
			// dataType: 'JSON',
			data: {
				reser_name: $('#reser_name').val(),
				reser_phone: $('#reser_phone').val(),
				reser_email: $('#reser_email').val(),
				reser_date: $('#reser_date').val(),
				reser_service: parseInt($('#reser_service option:selected').attr('value')),
				reser_gender: $('#reser_gender option:selected').attr('value'),
				reser_message: $('#reser_message').val()
			},
			success: function(msg) {
				alert(msg.success);
				$('#reser_name').val('');
				$('#reser_phone').val('');
				$('#reser_email').val('');
				$('#reser_date').val('');
			},
			error: function(xhr, status, err) {
				var error = JSON.parse(xhr.responseText);
				$.each(error, function(key, value) {
					$('#'+key).css('border-color','red');
					$('#'+key+"-err").text(value);
					$('#'+key+"-err").css('color','red');
				});
			}
		});
	});

	
});