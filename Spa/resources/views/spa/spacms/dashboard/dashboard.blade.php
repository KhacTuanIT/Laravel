@extends('spa.spacms.master') 

@push('meta-code')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script-header')
<script src="spacms/assets/js/jquery-2.2.3.min.js"></script>
@endpush

@section('menu-bar--dashboard')
m-menu__item  m-menu__item--active
@endsection

@section('menu-bar--class-collapse')
m-menu__item  m-menu__item--submenu
@endsection

@section('menu-bar--gallery')
m-menu__item
@endsection

@section('menu-bar--post')
m-menu__item
@endsection

@section('menu-bar--blog')
m-menu__item
@endsection

@section('menu-bar--service')
m-menu__item
@endsection

@section('menu-bar--feedback')
m-menu__item
@endsection

@section('menu-bar--comment')
m-menu__item
@endsection

@section('head-title')
Dashboard
@endsection

@section('content')

<div class="m-content">
	<div class="m-portlet ">
		<div class="m-portlet__body  m-portlet__body--no-padding">
			<div class="row m-row--no-padding m-row--col-separator-xl">
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Feedbacks-->
					<div class="m-widget24">
						<div class="m-widget24__item">
							<h4 class="m-widget24__title">
								Bộ sưu tập
							</h4>
							<br>
							@if(count($galleries) > 0)
							<a class="m-widget24__desc btn btn-secondary" style="margin-bottom: 10px;" data-url={{route('gallery-detail')}} id="bst-detail">
								<span class="m--font-secondary">
									Chi tiết
								</span>
							</a>
							@endif
							<h2 class="m-widget24__stats m--font-info">
								{{count($galleries)}}
							</h2>
						</div>
					</div>
					<!--end::New Feedbacks-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Orders-->
					<div class="m-widget24">
						<div class="m-widget24__item">
							<h4 class="m-widget24__title">
								Bài viết
							</h4>
							<br>
							@if(count($posts) > 0)
							<a class="m-widget24__desc btn btn-secondary" style="margin-bottom: 10px;" data-url={{route('post-detail')}} id="post-detail">
								<span class="m--font-secondary">
									Chi tiết
								</span>
							</a>
							@endif
							<h2 class="m-widget24__stats m--font-danger">
								{{count($posts)}}
							</h2>
						</div>
					</div>
					<!--end::New Orders-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Users-->
					<div class="m-widget24">
						<div class="m-widget24__item">
							<h4 class="m-widget24__title">
								Blogs
							</h4>
							<br>
							@if(count($blogs) > 0)
							<a class="m-widget24__desc btn btn-secondary" style="margin-bottom: 10px;" data-url={{route('blog-detail')}} id="blog-detail">
								<span class="m--font-secondary">
									Chi tiết
								</span>
							</a>
							@endif
							<h2 class="m-widget24__stats m--font-success">
								{{count($blogs)}}
							</h2>
						</div>
					</div>
					<!--end::New Users-->
				</div>
				<div class="col-md-12 col-lg-6 col-xl-3">
					<!--begin::New Feedbacks-->
					<div class="m-widget24">
						<div class="m-widget24__item">
							<h4 class="m-widget24__title">
								Dịch vụ
							</h4>
							<br>
							@if(count($services) > 0)
							<a class="m-widget24__desc btn btn-secondary" style="margin-bottom: 10px;" data-url={{route('service-detail')}} id="sv-detail">
								<span class="m--font-secondary">
									Chi tiết
								</span>
							</a>
							@endif
							<h2 class="m-widget24__stats m--font-brand">
								{{count($services)}}
							</h2>
						</div>
					</div>
					<!--end::New Feedbacks-->
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="m-portlet col-md-8">
			<div class="m-portlet__body" id="data-load">
				<table class="table table-bordered m-table m-table--border-success m-table--head-bg-success">
					<thead id="title-table">
					</thead>
					<tbody id="content-table">
					</tbody>
				</table>
			</div>
			<div class="m-portlet__body text-right">
				<span id="message" data-num="0" style="display: none;">0-0/0</span>
				<div class="btn-group m-btn-group m-btn-group--pill" id="paginate" style="display: none;" role="group" aria-label="...">
					<button type="button" class="m-btn btn btn-secondary" id="pre" data-id data-url>
						Lùi
					</button>
					<button type="button" class="m-btn btn btn-secondary" id="next" data-id data-url>
						Tiếp
					</button>
				</div>
			</div>
		</div>
		<div class="m-portlet m-portlet--tabs col-md-4">
			<div class="m-portlet__head">
				<div class="m-portlet__head-tools">
					<ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line-danger" role="tablist">
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link m--font-info active" data-toggle="tab" href="#comment-tab" id="comment" role="tab">
								Bình luận
							</a>
						</li>
						<li class="nav-item m-tabs__item">
							<a class="nav-link m-tabs__link m--font-accent" data-toggle="tab" href="#feedback-tab" id="feedback" role="tab">
								Phản hồi
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<div class="tab-content">
					<div class="tab-pane active" id="comment-tab">
						<div class="m-widget5 m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400" style="overflow:hidden; height: 400px"  id="ccomment" data-ccomment="{{count($comments)}}">
							@if(count($comments) > 0)
							@foreach($comments as $comment)
							<div class="m-widget5__item">
								<div class="m-widget5__content">
									<h3 class="m-widget5__title">
										{{$comment->name}}
										<div class="m-widget5__info text-right" style="display: inline-block;">
											<span class="m-widget5__info-date m--font-info">
												/ {{date('d.m.y h:i', strtotime($comment->created_at))}}
											</span>
										</div>
									</h3>
									<span class="m-widget5__desc">
										<b>Bài viết: </b>{{$comment->getPostComment->title}} <br/>
										Bình luận: {{$comment->message}}
									</span>
								</div>
							</div>
							@endforeach
							@else 
							<div class="m-widget5__item">
								<div class="m-widget5__content">
									<h3 class="m-widget5__title">
										Chưa có bình luận nào
									</h3>
								</div>
							</div>
							@endif
						</div>
					</div>
					<div class="tab-pane" id="feedback-tab">
						<div class="m-widget5 m-scrollable" data-scrollbar-shown="true" data-scrollable="true" data-max-height="400" style="overflow:hidden; height: 400px" id="cfeedback" data-cfeedback="{{count($feedbacks)}}">
							@if(count($feedbacks) > 0)
							@foreach($feedbacks as $feedback)
							<div class="m-widget5__item">
								<div class="m-widget5__content">
									<h3 class="m-widget5__title">
										{{$feedback->name}}
										<div class="m-widget5__info text-right" style="display: inline-block;">
											<span class="m-widget5__info-date m--font-info">
												/ {{date('d.m.y h:i', strtotime($feedback->created_at))}}
											</span>
										</div>
									</h3>
									<span class="m-widget5__desc">
										Phản hồi: {{$feedback->message}}
									</span>
								</div>
							</div>
							@endforeach
							@else
							<div class="m-widget5__item">
								<div class="m-widget5__content">
									<h3 class="m-widget5__title">
										Chưa có phản hồi nào
									</h3>
								</div>
							</div>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	var myRT = setInterval(loadRT, 3000);
	function loadRT() {
		$(document).ready(function() {
			var countc = $('#ccomment').attr('data-ccomment');
			var countf = $('#cfeedback').attr('data-cfeedback');
			$.ajaxSetup({
				headers: {
			        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    }
			});
			$.ajax({
				url: '{{route('rt')}}',
				type: 'post',
				data: {},
				success: function(msg) {
					var top = '<div class="m-widget5__item"><div class="m-widget5__content"><h3 class="m-widget5__title">';
					var mid = '<div class="m-widget5__info text-right" style="display: inline-block;"><span class="m-widget5__info-date m--font-info"> / ';
					var next = '</span></div></h3><span class="m-widget5__desc">';
					var bot = '</span></div></div>';
					if(msg.allf > countf) {
						console.log('New data');
						var codf = '';
						$.each(msg.feedbacks, function(key, value) {
							var t = '';
							var m = '';
							var n = '';
							var a = '';
							$.each(value, function(K, V) {
								if(K == 'name') {
									t = top + V;
								}
								if(K == 'message') {
									n = next + 'Phản hồi: ' +  V;
								}
								if(K == "created_at") {
									var d = new Date(V);
									m = mid + formatDate(d);
								}
							});
							codf = codf + t + m + n + bot;
						});
						$('#cfeedback').attr('data-cfeedback',msg.allf);
						$('#cfeedback').children().children('#mCSB_2_container').html(codf);
					}
					if(msg.allc > countc) {
						console.log('New data');
						var codc = '';
						$.each(msg.comments, function(KEY, VALUE) {
							var t = '';
							var m = '';
							var n = '';
							var a = '';
							$.each(VALUE, function(K, V) {
								if(K == 'post_id') {
									var id = V;
								}
								if(K == 'name') {
									t = top + V;
								}
								if(K == 'message') {
									a = '<br/> Bình luận: ' + V;
								}
								if(K == 'title') {
									n = next + '<b>Bài viết: </b> ' + V;
								}
								if(K == "created_at") {
									$.each(V, function(k, v) {
										if(k == 'date') {
											var d  = new Date(v);
											m = mid + formatDate(d);
										}
									});
								}
							});
							
							codc = codc + t + m + n + a + bot;
						});
						$('#ccomment').attr('data-ccomment',msg.allc);
						$('#ccomment').children().children('#mCSB_1_container').html(codc);
					}
				},
				error: function(xhr, status, err) {}
			});
		});
		
	} 
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
	  var strTime = hours + ':' + minutes;

	  var day = date.getDate();
	  var monthIndex = date.getMonth();
	  var year = date.getFullYear();

	  return day + '.' + monthIndex + '.' + year + ' ' + strTime;
	};
</script>
<script src="spacms/assets/js/detail.js"></script>
<script src="spacms/assets/js/custom.js"></script>
@endpush