$(document).ready(function() {
	$(document).on('click','#img_check',function() {
		if($(this).prop('checked')) {
			$(this).val('on');
			$('#box_imgedit').fadeIn();
		} else {
			$(this).val('off');
			$('#box_imgedit').fadeOut();
		}
	});
});