$(document).ready(function() {
	$(document).on('click','a[data-name="detail"]',function() {
		var comid = $(this).attr('data-comid');
		var URL = $(this).attr('data-url');
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {
				comid: comid
			},
			success: function(msg) {
				$('#data-comment').text('');
				$('#data-reply').text('');
				$.each(msg, function(key, value) {
					console.log(key);
					console.log(value);
					if(key == 'comment') {
						$('#data-comment').append('<tr>');
						$.each(value, function(k, v) {
							if(k != 'Bài viết') {
								$('#data-comment').append('<th class="m--font-success">' + k + "</th>");
								$('#data-reply').append('<th class="m--font-success">' + k + "</th>");
							} else {
								$('#post-title').text(v);
							}
						});
						$('#data-comment').append('</tr>');
						$('#data-comment').append('<tr>');
						$.each(value, function(k, v) {
							if(k != 'Bài viết') {
								$('#data-comment').append('<th>' + v + "</th>");	
							}
						});
						$('#data-comment').append('</tr>');
					}
					else if(key == 'reply') {
						$.each(value, function(K, V) {
							$('#data-reply').append('<tr>');
							$.each(V, function(k, v) {
								$('#data-reply').append('<th>' + v + "</th>");
							});
							$('#data-reply').append('</tr>');
						});
					} else {
						if(value > 0) {
							$('#count-reply').text(value);
							$('#header-reply').fadeIn();
							$('#data-reply').fadeIn();
						} else {
							$('#count-reply').text(0);
							$('#header-reply').fadeOut();
							$('#data-reply').fadeOut();
						}
					}
				});
			},
			error: function(xhr, status, err) {}
		});
	});
});