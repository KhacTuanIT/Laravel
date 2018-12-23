$(document).ready(function() {
	$('#feedback').click(function() {
		var feedURL = $(this).attr('data-feedurl');
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: feedURL,
			type: 'post',
			data: {
				'name_feedback': $('#name_feedback').val(),
				'email_feedback': $('#email_feedback').val(),
				'address_feedback': $('#address_feedback').val(),
				'phone_feedback': $('#phone_feedback').val(),
				'message_feedback': $('#message_feedback').val(),
			},
			success: function(data) {
				console.log(data['data']);
				alert(data['data']);
				$('#name_feedback').val('');
				$('#email_feedback').val('');
				$('#address_feedback').val('');
				$('#phone_feedback').val('');
				$('#message_feedback').val('');
			},
			error: function(xhr, status, err) {
				var error = xhr.responseJSON;
				$.each(error, function(key, value) {
					$('#error--'+key).text(value);
					$('#error--'+key).css('color','#f4516c');
					$('#'+key).css('border-color','#f4516c');
				});
			}
		});
	});
});