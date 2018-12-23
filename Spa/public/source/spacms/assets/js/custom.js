$(document).ready(function() {
	$('#pre').on('click', function() {
		var URL = $(this).attr('data-url');
		var numdata = $('#message').attr('data-num');
		var cont = '';
		console.log(URL);
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {
				numdata: numdata,
			},
			success: function(msg) {
				if(msg.temp == 2) {
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					var preInt = parseInt($('#pre').attr('data-id'));
					var nextInt = parseInt($('#next').attr('data-id'));
					if(nextInt > 9 ) {
						if(preInt > 9) {
							$('#pre').attr('data-url',URL.substr(0, URL.length-6)+ '/' +msg.id + '/' + $('#pre').attr('data-id'));
						} else {
							$('#pre').attr('data-url',URL.substr(0, URL.length-5)+ '/' +msg.id + '/' + $('#pre').attr('data-id'));
						}
					} else {
						$('#pre').attr('data-url',URL.substr(0, URL.length-4)+ '/' +msg.id + '/' + $('#pre').attr('data-id'));
					}
					$('#pre').attr('data-id',msg.idpre);
					$('#pre').fadeIn();
					if(nextInt > 9) {
						if(preInt > 9) {
							$('#next').attr('data-url',URL.substr(0, URL.length-6)+ '/' +msg.id);
						} else {
							$('#next').attr('data-url',URL.substr(0, URL.length-5)+ '/' +msg.id);
						}
					}
					$('#next').attr('data-id',msg.id);
					$('#next').fadeIn();
					var numnext = msg.num;
					var num = numnext-4;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);
					$('#message').fadeIn();
				} else if (msg.temp == 1){
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').addClass('disabled');
					$('#pre').attr('data-url','');
					$('#pre').attr('data-id',msg.idpre);
					$('#pre').fadeIn();
					var preInt = parseInt($('#pre').attr('data-id'));
					var nextInt = parseInt($('#next').attr('data-id'));
					if(nextInt > 9 ) {
						if(preInt > 9) {
							$('#next').attr('data-url',URL.substr(0, URL.length-6)+ '/' +msg.id);
						} else {
							$('#next').attr('data-url',URL.substr(0, URL.length-5)+ '/' +msg.id);
						}
					} else {
						$('#next').attr('data-url',URL.substr(0, URL.length-4)+ '/' +msg.id);
					}
					$('#next').removeClass('disabled');
					$('#next').attr('data-id',msg.id);
					$('#next').fadeIn();
					var numnext = msg.num;
					var num = numnext-4;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);	
					$('#message').fadeIn();
				} else {
					$('#data-load').fadeOut();
					$('#paginate').fadeOut();
					$('#message').fadeOut();
				}
			},
			error: function(xhr, status, err) {}
		});
	});
	$('#next').on('click', function() {
		var URL = $(this).attr('data-url');
		var numdata = $('#message').attr('data-num');
		var numid = $(this).attr('data-id');
		var cont = '';
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {
				numdata: numdata,
			},
			success: function(msg) {
				if(msg.temp == 2) {
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').attr('data-id',numid);
					$('#pre').attr('data-url',URL+ '/' +msg.id);
					$('#pre').fadeIn();
					$('#next').attr('data-id',msg.id);
					if(numid > 9) {
						$('#next').attr('data-url',URL.substr(0, URL.length-3)+ '/' +msg.id);
					} else {
						$('#next').attr('data-url',URL.substr(0, URL.length-2)+ '/' +msg.id);
					}
					$('#next').fadeIn();
					var num = parseInt($('#message').attr('data-num'));
					var numnext = num + msg.num;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);
					$('#message').fadeIn();
				} else if (msg.temp == 1){
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').attr('data-id',$('#next').attr('data-id'));
					$('#pre').attr('data-url',URL+ '/' +msg.id);
					$('#pre').fadeIn();
					$('#next').attr('data-id',msg.id);
					$('#next').attr('data-url','');
					$('#next').removeClass('disabled');
					$('#next').addClass('disabled');
					$('#next').fadeIn();
					var num = parseInt($('#message').attr('data-num')) + 1;
					var numnext = num + msg.num;
					$('#message').attr('data-num',numnext);
					$('#message').text(num+ '-' + numnext + '/' + msg.all);	
					$('#message').fadeIn();
				} else {
					$('#data-load').fadeOut();
					$('#paginate').fadeOut();
					$('#message').fadeOut();
				}
			},
			error: function(xhr, status, err) {}
		});
	});
	
});