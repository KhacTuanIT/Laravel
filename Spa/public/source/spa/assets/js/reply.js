$(document).ready(function() {
	$(document).on('click','input[name="reply_button"]',(function() {
		var reURL = $(this).attr('data-reurl');
		$this = $(this);
		$parent = $(this).parent().parent();
		$super = $parent.parent().parent().parent();
		var id_comment = $parent.attr('id');
		var name = $parent.children().children('input.name_reply').val();
		var id_post = $(this).attr('data-pid');
		var num_re = parseInt($(this).attr('data-numre')) + 1;
		console.log(id_comment);
		console.log(num_re);
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: reURL,
			type: 'post',
			data: {
				'id_post': id_post,
				'id_comment': id_comment,
				'name_reply': $parent.children().children('input.name_reply').val(),
				'email_reply': $parent.children().children('input.email_reply').val(),
				'message_reply': $parent.children().children('textarea.message_reply').val(),
			},
			success: function(data) {
				alert(data['data']);
				$super.children('.reply-box').append(data['msg']);
				$parent.children().children('input.name_reply').val('');
				$parent.children().children('input.email_reply').val('');
				$parent.children().children('textarea.message_reply').val('');
				$parent.parent().parent().fadeOut();
				$super.children().children('.num-reply').text(num_re + " câu trả lời cho bình luận này");
				$super.children().children('.num-reply').fadeIn();
				$this.attr('data-numre',num_re);
			},
			error: function(xhr, status, err) {
				var error = xhr.responseJSON;
				$.each(error, function(key, value) {
					if(key == 'message_reply') {
						$parent.children().children('textarea.'+key).css('border-color','#f4516c');
					} else {
						$parent.children().children('input.'+key).css('border-color','#f4516c');
					}
				});
			}
		});
	}));
});

$(document).ready(function() {
	
	$(document).on('click','small[class="num-reply"]',(function() {
		// $countC = 0;
		$parent = $(this).parent().parent();
		$parent.children('.reply-box').fadeIn();
		$(this).fadeOut();
	}));
});

$(document).ready(function() {
	$countN = 0;
	$(document).on('click','small[class="reply"]',(function() {
		$parent = $(this).parent().parent();
		$parent.children('.box-comment').fadeIn();
		// $countN = $countN + 1;
		// if($countN % 2 == 1) {
		// 	$('.box-comment:gt(0)').fadeOut();
		// 	// $('.box-comment:first').fadeIn();
		// } else {
		// 	$parent.children('.box-comment').fadeOut();
		// }
	}));
});
