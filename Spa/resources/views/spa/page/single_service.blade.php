@extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">{{$service->title}}</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Dịch vụ</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container blog-page">
		<div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0" style="position: relative;margin-bottom: 10px;">
			<!-- <div class="owl-carousel owl-theme" id="blog-header">
				<div class="item">
					<img src="assets/images/blog/main.jpg">
				</div>
				<div class="item">
					<img src="assets/images/blog/main2.jpg">
				</div>
			</div> -->
			<div class="box-blog">
				<div class="box-content-blog">
					<div class="bcb-body">
						<img src="assets/images/services/{{$service->image}}" width="100%">
						<div>
							{{$service->description}}
						</div>
					</div>
				</div>
			</div>
			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span>Dịch vụ khác</span>
					</div>
					<div class="blog-post-body text-center">
						@foreach($services as $sv)
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 bpb-feature">
							<div class="bpb-img">
								<img src="assets/images/services/{{$sv->image}}" width="100%">
							</div>
							<div class="bpb-title"><a href="">{{$sv->title}}</a></div>
							<div class="bpb-time">
								{{date('d/m/Y',strtotime($service->created_at))}}
							</div>
							<div class="bpb-content">
								{{substr($sv->description,0,140)}} [...]
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="clear"></div>

			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span>Gửi phản hồi</span>
					</div>
				</div>

				<div class="text-center form-contact">
					<form>
						<div class="col-sm-6 col-xs-12 form-group">
							<input class="form-control" type="text" name="" placeholder="Họ tên" >
							<i class="fas fa-user"></i>
						</div>
						<div class="col-sm-6 col-xs-12 form-group">
							<input class="form-control" type="text" name="" placeholder="Địa chỉ">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="col-sm-6 col-xs-12 form-group">
							<input class="form-control" type="email" name="" placeholder="Email">
							<i class="fas fa-envelope"></i>
						</div>
						<div class="col-sm-6 col-xs-12 form-group">
							<input class="form-control" type="text" name="" placeholder="Số điện thoại">
							<i class="fas fa-phone"></i>
						</div>
						<div class="col-sm-12 col-xs-12 form-group last-fg">
							<textarea class="form-control" type="text" name="">
							</textarea>
							<i class="fas fa-paper-plane"></i>
						</div>
						<div class="col-sm-12 col-xs-12 form-group text-right">
							<input type="submit" name="" id="" value="Gửi phản hồi">
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')
<script src="assets/js/load-page.js"></script>
<script src="assets/dist/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/carousel-custom.js"></script>
<script src="assets/js/gallery-custom.js"></script>
<script src="assets/js/wow-custom.js"></script>
<script src="assets/js/page-custom.js"></script>
@endpush