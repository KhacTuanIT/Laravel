$(document).ready(function() {

	$('#bst-detail').on('click', function() {
		var URL = $(this).attr('data-url');
		var title = '<th>Tiêu đề</th><th>Mô tả</th><th>Loại dịch vụ</th><th>Thời gian tạo</th>';
		var cont = '';
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {},
			success: function(msg) {
				if(msg.temp == 2) {
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').addClass('disabled');
					$('#next').attr('data-id',msg.id);
					$('#next').attr('data-url',URL+ '/' +msg.id);
					$('#next').fadeIn();
					var num = 1;
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
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeOut();
					var num = 1;
					var numnext = num + msg.num;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);	
					$('#message').fadeIn();
				} else {
					$('#paginate').fadeOut();
					$('#message').fadeOut();
				}
			},
			error: function(xhr, status, err) {}
		});
	});
	$('#blog-detail').on('click', function() {
		var URL = $(this).attr('data-url');
		var title = '<th>Tiêu đề</th><th>Mô tả</th><th>Ghi chú</th><th>Thời gian tạo</th>';
		var cont = '';
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {},
			success: function(msg) {
				if(msg.temp == 2) {
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').addClass('disabled');
					$('#next').attr('data-id',msg.id);
					$('#next').attr('data-url',URL+ '/' +msg.id);
					$('#next').fadeIn();
					var num = 1;
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
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeOut();
					var num = 1;
					var numnext = num + msg.num;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);	
					$('#message').fadeIn();
				} else {
					$('#paginate').fadeOut();
					$('#message').fadeOut();
				}
			},
			error: function(xhr, status, err) {}
		});
	});
	$('#sv-detail').on('click', function() {
		var URL = $(this).attr('data-url');
		var title = '<th>Tiêu đề</th><th>Mô tả</th><th>Giá</th><th>Loại dịch vụ</th><th>Thời gian tạo</th>';
		var cont = '';
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {},
			success: function(msg) {
				if(msg.temp == 2) {
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').addClass('disabled');
					$('#next').attr('data-id',msg.id);
					$('#next').attr('data-url',URL+ '/' +msg.id);
					$('#next').fadeIn();
					var num = 1;
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
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeOut();
					var num = 1;
					var numnext = num + msg.num;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);	
					$('#message').fadeIn();
				} else {
					$('#paginate').fadeOut();
					$('#message').fadeOut();
				}
			},
			error: function(xhr, status, err) {}
		});
	});
	$('#post-detail').on('click', function() {
		var URL = $(this).attr('data-url');
		var title = '<th>Tiêu đề</th><th>Mô tả</th><th>Loại dịch vụ</th><th>Thời gian tạo</th>';
		var cont = '';
		$.ajaxSetup({
			headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});
		$.ajax({
			url: URL,
			type: 'post',
			data: {},
			success: function(msg) {
				if(msg.temp == 2) {
					$.each(msg.data, function(key,value) {
						cont = cont +'<tr>';
						$.each(value, function(k,v) {
							cont = cont +'<td>'+ v +'</td>';
						});
						cont = cont +'</tr>';
					});
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeIn();
					$('#pre').removeClass('disabled');
					$('#pre').addClass('disabled');
					$('#next').attr('data-id',msg.id);
					$('#next').attr('data-url',URL+ '/' +msg.id);
					$('#next').fadeIn();
					var num = 1;
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
					$('#title-table').html(title);
					$('#content-table').html(cont);
					$('#paginate').fadeOut();
					var num = 1;
					var numnext = num + msg.num;
					$('#message').attr('data-num',numnext);
					$('#message').text(num + '-' + numnext + '/' + msg.all);	
					$('#message').fadeIn();
				} else {
					$('#paginate').fadeOut();
					$('#message').fadeOut();
				}
			},
			error: function(xhr, status, err) {}
		});
	});


	
});
