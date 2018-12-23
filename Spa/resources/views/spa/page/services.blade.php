 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Dịch vụ</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Dịch vụ</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>Dịch vụ</span>
		</h2>
		<span class="content-os">
			{{$service_hot[0]->description}}
		</span>
	</div>
	{{-- <div class="container">
		<div class="col-sm-12 service-box-top">
			<div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0">
				<div>
					<img src="assets/images/services/{{$service_hot[0]->image}}" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 sbt-content">
				Assertively cultivate professional interfaces without synergistic wor networks. Quickly erage existing customized ideas through client a based eliverables. Compellingly unleash fully tested outsourcing.
			</div>
		</div>
	</div> --}}
	<div class="container our-services">
		@foreach($services as $service)
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
			<img src="assets/images/services/{{$service->image}}" width="100%" height="250px">
			<h3 class="text-center">{{$service->title}}</h3>
			<p>
				{{substr($service->description,0,140)}}[...]
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

	<div class="clear"></div>
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
			<div class="galleryContainer text-center" id="h-service">
				@foreach($galleries as $gallery)
				<div class="col-sm-3 col-xs-6 {{$gallery->type}} grid-item">
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

<div class="container-fluid" style="padding: 0;">
	<div class="our-service-box">
		<div class="owl-carousel owl-theme own-img-service">
			@foreach($sliders as $slider)
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/sliders/{{$slider->image}}">
				</div>
			</div>
			@endforeach
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