 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Services</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Home / Services</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>Services</span>
		</h2>
		<span class="content-os">
			This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
		</span>
	</div>
	<div class="container">
		<div class="col-sm-12 service-box-top">
			<div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0">
				<div>
					<img src="assets/images/service/base.jpg" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 sbt-content">
				Assertively cultivate professional interfaces without synergistic wor networks. Quickly erage existing customized ideas through client a based eliverables. Compellingly unleash fully tested outsourcing.
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 sbt-content">
				Assertively cultivate professional interfaces without synergistic wor networks. Quickly erage existing customized ideas through client a based eliverables. Compellingly unleash fully tested outsourcing.
			</div>
		</div>
	</div>
	<div class="container our-services">
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
			<img src="assets/images/service/gallery1.jpg" width="100%">
			<h3 class="text-center">BODY MASSAGE</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor
			</p>
			<div class="service-price-section">
				<div class="col-sm-6 text-left">
					Price
				</div>
				<div class="col-sm-6 text-right">
					&#36;10
				</div>
			</div>
			<div class="text-center service-book">
				<a class="btn-book-service" href="">book now</a>
			</div>
		</div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
			<img src="assets/images/service/gallery2.jpg" width="100%">
			<h3 class="text-center">REFLEXOLOGY</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor
			</p>
			<div class="service-price-section">
				<div class="col-sm-6 text-left">
					Price
				</div>
				<div class="col-sm-6 text-right">
					&#36;10
				</div>
			</div>
			<div class="text-center service-book">
				<a class="btn-book-service" href="">book now</a>
			</div>
		</div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0">
			<img src="assets/images/service/gallery3.jpg" width="100%">
			<h3 class="text-center">PROFESSIONAL MACKUP</h3>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor
			</p>
			<div class="service-price-section">
				<div class="col-sm-6 text-left">
					Price
				</div>
				<div class="col-sm-6 text-right">
					&#36;10
				</div>
			</div>
			<div class="text-center service-book">
				<a class="btn-book-service" href="">book now</a>
			</div>
		</div>
	</div>

	<div class="clear"></div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>gallery</span>
		</h2>
	</div>
	<div class="container gallery-menu">
		<div class="gallery-filter-group">
			
			<ul class="galleryFilter text-center">
				<li>
					<a data-filter="*" class="btn btn-gallery current">
						Beauty
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
				<li>
					<a data-filter="hair" class="btn btn-gallery">
						Hair
					</a>
				</li>
			</ul>
		</div>

		<div class="grid">
			<div class="galleryContainer text-center" id="h-service">
				<div class="col-sm-3 col-xs-6 massage grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery1.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 massage grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery2.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 markup grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery3.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 massage grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery4.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 hair grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery5.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 markup grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery6.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 hair grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery7.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3 col-xs-6 hair grid-item">
					<div class="gallery-hvr">
						<div class="gallery-img">
							<img src="assets/images/service/gallery8.jpg" width="100%">
							<div class="gallery-img-eff">
								<div class="content-eff">
									<span class="name-service">Massage</span>
									<span class="time-service">23 Jan 2018</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<div class="container-fluid" style="padding: 0;">
	<div class="our-service-box">
		<div class="owl-carousel owl-theme own-img-service">
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/1.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/2.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/3.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/4.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/5.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/6.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/7.jpg">
				</div>
			</div>
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/footer/8.jpg">
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')
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