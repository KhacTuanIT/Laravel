$(document).ready(function() {
	$(document).on('click','.b-d',function() {
		var url = $(this).data('url');
		var title = $(this).data('t');
		$('#title-del').text(title);
		$('#del-modal').attr('href',url);
	});
});