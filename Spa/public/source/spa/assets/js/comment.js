$(document).ready(function() {
	$('#comment_button').click(function() {

		var id_post = $(this).attr('data-pid');
		var comURL = $(this).attr('data-comurl');
		var reURL = $(this).attr('data-reurl');
		var numcom = parseInt($('#numcom').attr('data-numcom'));
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: comURL,
			type: 'post',
			data: {
				'reurl' : reURL,
				'id_post': id_post,
				'name_comment': $('#name_comment').val(),
				'email_comment': $('#email_comment').val(),
				'message_comment': $('#message_comment').val(),
			},
			success: function(data) {
				alert(data['data']);
				console.log("le: " + $('#boxer-comment').length);
				console.log("te: " + $('#boxer-comment').text());
				console.log("ht: " + $('#boxer-comment').html());
				console.log("va: " + $('#boxer-comment').val());
				if($('#boxer-comment').length == 1 && $('#boxer-comment').html() == "") {
					$('#boxer-comment').append(data['msg']);
				} else {
					$('.boxcom:eq(0)').before(data['msg']);
				}
				$('#name_comment').val('');
				$('#email_comment').val('');
				$('#message_comment').val('');
				numcom = numcom+1;
				$('#numcom').attr('data-numcom',numcom);
				$('#numcom').text(' ' + numcom);
				
			},
			error: function(xhr, status, err) {
				var error = xhr.responseJSON;
				$.each(error, function(key, value) {
					$('#'+key).css('border-color','#f4516c');
				});
			}
		});
	});
});

function formatDate(date) {
  var monthNames = [
    "Jan", "Feb", "Mar",
    "April", "May", "Jun", "Jul",
    "Aug", "Sep", "Oct",
    "Nov", "Dec"
  ];
  var hours = date.getHours();
  var minutes = date.getMinutes();
  var ampm = hours >= 12 ? 'pm' : 'am';
  hours = hours % 12;
  hours = hours ? hours : 12;
  minutes = minutes < 10 ? '0'+minutes : minutes;
  var strTime = hours + ':' + minutes + ' ' + ampm;

  var day = date.getDate();
  var monthIndex = date.getMonth();
  var year = date.getFullYear();

  return strTime + '-' + monthNames[monthIndex] + ' ' + day + ', ' + year;
};


$(document).ready(function() {
	$('.load-comment').click(function() {
		var loadURL = $(this).attr('data-loadURL');
		var comURL = $(this).attr('data-URL');
		var idPOST = $(this).attr('data-idPOST');
		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: loadURL,
			type: 'get',
			data: {},
			success: function(data) {
				console.log(data);
				
				var comments;
				var replies;
				var id_comment;
				$.each(data, function(key, value) {
					if(key == 'msg') {
						comments = value;
					} else if(key == 'replies') {
						replies = value;
					} else {
						id_comment = value;
					}
				});
				$.each(comments, function(key, value) {
					var re = '';
					var nu = 0;
					$.each(replies, function(k, v) {
			      		if(value['id'] == v['comment_id']) {
			      			nu += 1;
			      			var date = new Date(v['created_at']);
			      			var e = formatDate(date);
			      			re = re + '<div class="media"><div class="media-left"><img src="assets/images/img_avatar1.png" class="media-object" style="width:45px"></div><div class="media-body"><h4 class="media-heading">' + v['name'] + ' <small><i>Posted on ' + e + '</i></small></h4><p>' + v['message'] + '.</p></div></div>';
			      		}
			      	});
			      	var nre = '';
			      	if(nu > 0) {
			      		nre = '<small class="num-reply"> '+nu+' câu trả lời cho bình luận này</small>';
			      	}
			      	var da = new Date(value['created_at']);
			      	var er = formatDate(da);
					$('#boxer-comment').append('<div class="col-sm-12 col-xs-12"><div class="media-left"><img src="assets/images/img_avatar1.png" class="media-object" style="width:45px"></div><div class="media-body"><h4 class="media-heading">' + value['name'] + ' <small><i>Posted on '+ er + '</i></small> <small class="reply">Trả lời</small> ' + nre + '</h4><p>' + value['message'] + '.</p><!-- Nested media object --><div class="reply-box" style="display: none;">'+ re +'</div><div class="box-comment" style="display: none;"><div class="text-center form-comment"><form id="' + value['id'] + '"><div class="col-sm-6 col-xs-12 form-group"><input class="form-control name_reply" type="text" name="name_reply" placeholder="Họ tên" ><!-- <i class="fas fa-user"></i> --></div><div class="col-sm-6 col-xs-12 form-group"><input class="form-control email_reply" type="email" name="email_reply" placeholder="Email" ><!-- <i class="fas fa-user"></i> --></div><div class="col-sm-12 col-xs-12 form-group"><textarea class="form-control message_reply" rows="5" name="message_reply"></textarea><i class="fas fa-paper-plane"></i></div><div class="col-sm-12 col-xs-12 form-group text-right"><input class="btn-book-service reply_button" type="button" name="reply_button" value="Trả lời"></div></form></div><div class="clear"></div></div></div></div>');
				});
				if(id_comment == 0) {
					$('.load-comment').fadeOut();
				} 
				$('.load-comment').attr('data-loadURL', comURL + "/" + id_comment + "/" + idPOST) ;
			},
			error: function(xhr, status, err) {}
		});
	});
});