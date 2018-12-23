$(document).ready(function() {
	$('.name_reply').keyup(function() {
		$(this).css('border-color','#ccc');
	});
	$('.email_reply').keyup(function() {
		$(this).css('border-color','#ccc');
	});
	$('.message_reply').keyup(function() {
		$(this).css('border-color','#ccc');
	});
	$('#name_comment').keyup(function() {
		$(this).css('border-color','#ccc');
	});
	$('#email_comment').keyup(function() {
		$(this).css('border-color','#ccc');
	});
	$('#message_comment').keyup(function() {
		$(this).css('border-color','#ccc');
	});
	$('#name_feedback').keyup(function() {
		$('#name_feedback').css('border-color','#ccc');
		$('#error--name_feedback').text('');
	});
	$('#email_feedback').keyup(function() {
		$('#email_feedback').css('border-color','#ccc');
		$('#error--email_feedback').text('');
	});
	$('#address_feedback').keyup(function() {
		$('#address_feedback').css('border-color','#ccc');
		$('#error--address_feedback').text('');
	});
	$('#phone_feedback').keyup(function() {
		$('#phone_feedback').css('border-color','#ccc');
		$('#error--phone_feedback').text('');
	});
	$('#message_feedback').keyup(function() {
		$('#message_feedback').css('border-color','#ccc');
		$('#error--message_feedback').text('');
	});

	$('#reser_name').keyup(function() {
		$(this).css('border-color','#ccc');
		$('#reser_name-err').text('');
	});
	$('#reser_phone').keyup(function() {
		$(this).css('border-color','#ccc');
		$('#reser_phone-err').text('');
	});
	$('#reser_email').keyup(function() {
		$(this).css('border-color','#ccc');
		$('#reser_email-err').text('');
	});
	$('#reser_date').click(function() {
		$(this).css('border-color','#ccc');
		$('#reser_date-err').text('');
	});
});