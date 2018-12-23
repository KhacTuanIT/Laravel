@extends('spa.master')

@section('title','Da Nang Spa')

@section('content')
<div class="container-fluid wrapper">
	<div class="container">
		<div class="home-content">
			<div class="col-sm-12 text-left">
				<div class="col-sm-5 layout-header">
					<h1>
						Calm Spa
						<span>Beauty</span>
					</h1>
					<p>A simple web-based platform focused on improving the travel industry.</p>
				</div>
			</div>
			<div class="img-flower1"><img src="assets/images/home/layout1/img-flower-1.png"></div>
			<div class="img-flower2"><img src="assets/images/home/layout1/img-flower-2.png"></div>
			<div class="img-flower3"><img src="assets/images/home/layout1/img-flower-3.png"></div>
			<div class="img-flower4"><img src="assets/images/home/layout1/img-flower-4.png"></div>
			<div class="img-flower5"><img src="assets/images/home/layout1/img-flower-5.png"></div>
		</div>
	</div>
</div>
<div class="container-fluid section">
	<div class="small-st">
		<div class="container small-section">
			<div class="col-xs-12 col-sm-12 text-small">
				<div class="col-sm-4 layout-small-section">
					<div class="col-xs-3 col-sm-3">
						<img src="assets/images/time.png">
					</div>
					<div class="col-xs-9 col-sm-9">
						<span class="lss-top">Mở cửa</span>
						<span class="lss-bottom">Thứ 2 - Thứ 7 : 8:00AM - 7:00PM</span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-sm-4 layout-small-section">
					<div class="col-xs-3 col-sm-3">
						<img src="assets/images/location.png">
					</div>
					<div class="col-xs-9 col-sm-9">
						<span class="lss-top">Địa chỉ</span>
						<span class="lss-bottom">315 Phạm Ngũ Lão, Q1, Tp.HCM</span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-sm-4 layout-small-section">
					<div class="col-xs-3 col-sm-3">
						<img src="assets/images/contact.png">
					</div>
					<div class="col-xs-9 col-sm-9">	
						<span class="lss-top">số điện thoại</span>
						<span class="lss-bottom">(0261) - 4532654</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container our-service text-center">
		<h2 class="title-os">
			Đặt lịch
			<span>Dịch vụ</span>
		</h2>
	</div>
	<div class="container our-services">
		@foreach($services as $service)
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
			<img src="assets/images/services/{{$service->image}}" width="100%">
			<h3 class="text-center">{{$service->title}}</h3>
			<p>
				{{$service->description}}
			</p>
			<div class="service-price-section">
				<div class="col-sm-6 text-left">
					Giá
				</div>
				<div class="col-sm-6 text-right">
					VND {{$service->price}}
				</div>
			</div>
			<div class="text-center service-book">
				<a class="btn-book-service" href="">Đặt lịch</a>
			</div>
		</div>
		@endforeach
	</div>
</div>
<div class="container-fluid highlight-service" id="h-service">
	<div class="container">
		<div class="col-sm-12">
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-image">
				<div class="wow fadeInLeft">
					<img src="assets/images/posts/{{$posts[0]->image}}" width="100%" height="280px">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-content">
				<h3 class="hs-title text-center">{{$posts[1]->title}}</h3>
				<div>
					{{substr($posts[1]->description,0,100)}}[...]
				</div>
				<div class="text-right">
					<a class="btn-ob" href="{{route('post-single',$posts[1]->id)}}">Xem chi tiết</a>
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-image">
				<div class="wow fadeInRight">
					<img src="assets/images/posts/{{$posts[2]->image}}" width="100%" height="280px">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-content">
				<h3 class="hs-title text-center">{{$posts[0]->title}}</h3>
				<div>
					{{substr($posts[0]->description,0,100)}}[...]
				</div>
				<div class="text-right">
					<a class="btn-ob" href="{{route('post-single',$posts[0]->id)}}">Xem chi tiết</a>
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-image">
				<div class="wow fadeInUp">
					<img src="assets/images/posts/{{$posts[1]->image}}" width="100%" height="280px">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-content">
				<h3 class="hs-title text-center">{{$posts[2]->title}}</h3>
				<div>
					{{substr($posts[2]->description,0,110)}}[...]
				</div>
				<div class="text-right">
					<a class="btn-ob" href="{{route('post-single',$posts[2]->id)}}">Xem chi tiết</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>Bộ sưu tập</span>
		</h2>
	</div>
	<div class="container gallery-menu">
		<div class="gallery-filter-group">
			
			<ul class="galleryFilter text-center">
				<li>
					<a data-filter="*" class="btn btn-gallery current">
						Làm đẹp
					</a>
				</li>
				<li>
					<a data-filter="massage" class="btn btn-gallery">
						Massage
					</a>
				</li>
				<li>
					<a data-filter="markup" class="btn btn-gallery">
						Markup
					</a>
				</li>
			</ul>
		</div>

		<div class="grid">
			<div class="galleryContainer text-center">
				@foreach($galleries as $gallery)
				<div class="col-sm-4 col-xs-6 {{$gallery->type}} grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/galleries/{{$gallery->image}}" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">{{$gallery->title}}</span>
									<span class="time-service">{{date('d/m/Y',strtotime($gallery->created_at))}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="container-fluid highlight-service">
	<div class="container">
		<div class="our-service text-center">
			<h2 class="title-os">
				<span>Dịch vụ</span> của chúng tôi
			</h2>
		</div>
		<div class="clear"></div>
		<div class="our-service-box">
			<div class="owl-carousel owl-theme own-blog-service">
				@foreach($services as $service)
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/services/{{$service->image}}">
						<div class="ob-eff-content">
							{{-- <span>Content</span> --}}
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								{{$service->title}}
							</span>
							<span class="ob-time">
								{{$service->created_at}}
							</span>
						</div>
						<div>
							{{substr($service->description,0,190)}}[...]
						</div>
						<div class="text-right">
							<a href="{{route('service-single',$service->id)}}" class="btn-ob">Xem chi tiết</a>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>Liên hệ</span>
		</h2>
	</div>
	<div id="googleMap"></div>

	<div class="container form-contact">
		<form>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" id="name_feedback" name="name_feedback" placeholder="Họ tên" >
				<i class="fas fa-user"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" id="address_feedback" name="address_feedback" placeholder="Địa chỉ">
				<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="col-sm-6 col-xs-12 none-margin">
				<span class="m--font-danger" id="error--name_feedback"></span>
			</div>
			<div class="col-sm-6 col-xs-12 none-margin">
				<span class="m--font-danger" id="error--address_feedback"></span>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="email" id="email_feedback" name="email_feedback" placeholder="Email">
				<i class="fas fa-envelope"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" id="phone_feedback" name="phone_feedback" placeholder="Số điện thoại">
				<i class="fas fa-phone"></i>
			</div>
			<div class="col-sm-6 col-xs-12 none-margin">
				<span class="m--font-danger" id="error--email_feedback"></span>
			</div>
			<div class="col-sm-6 col-xs-12 none-margin">
				<span class="m--font-danger" id="error--phone_feedback"></span>
			</div>
			<div class="col-sm-12 col-xs-12 form-group last-fg">
				<textarea class="form-control" type="text" id="message_feedback" name="message_feedback">
				</textarea>
				<i class="fas fa-paper-plane"></i>
			</div>
			<div class="col-sm-12 col-xs-12 none-margin">
				<span class="m--font-danger" id="error--message_feedback"></span>
			</div>
			<div class="col-sm-12 col-xs-12 form-group text-right">
				<input type="button" name="feedback" data-feedurl="{{route('feedback')}}" id="feedback" value="Gửi phản hồi">
			</div>
		</form>
	</div>
	<div class="clear"></div>
	
</div>

@endsection

@push('script')

<script src="assets/js/feedback.js"></script>
<script src="assets/js/javascript.js"></script>
<script src="assets/js/load-page.js"></script>
<script src="assets/dist/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCn9vJtX9_E8tMRatRJjWZ2OGkII0z0LHo"></script>
<script src="assets/js/gmaps.js"></script>
<script src="assets/js/gmaps-custom.js"></script>
<script src="assets/js/carousel-custom.js"></script>
<script src="assets/js/gallery-custom.js"></script>
<script src="assets/js/wow-custom.js"></script>
<script src="assets/js/page-custom.js"></script>
@endpush