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
						<span class="lss-top">opening time</span>
						<span class="lss-bottom">Monday - Saturday : 8:00AM - 7:00PM</span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-sm-4 layout-small-section">
					<div class="col-xs-3 col-sm-3">
						<img src="assets/images/location.png">
					</div>
					<div class="col-xs-9 col-sm-9">
						<span class="lss-top">location</span>
						<span class="lss-bottom">208, Royal Square, Surat.</span>
					</div>
					<div class="clear"></div>
				</div>
				<div class="col-sm-4 layout-small-section">
					<div class="col-xs-3 col-sm-3">
						<img src="assets/images/contact.png">
					</div>
					<div class="col-xs-9 col-sm-9">	
						<span class="lss-top">contact</span>
						<span class="lss-bottom">(0261) - 4532654</span>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	</div>
	<div class="container our-service text-center">
		<h2 class="title-os">
			check out
			<span>our services</span>
		</h2>
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
</div>
<div class="container-fluid highlight-service" id="h-service">
	<div class="container">
		<div class="col-sm-12">
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-image">
				<div class="wow fadeInLeft">
					<img src="assets/images/service/servicedescription2.jpg" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-content">
				<h3 class="hs-title text-center">Title</h3>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor
				</div>
				<div class="text-right">
					<a class="btn-ob" href="">read more</a>
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-image">
				<div class="wow fadeInRight">
					<img src="assets/images/service/servicedescription3.jpg" width="100%">
				</div>
			</div>
		</div>
		<div class="col-sm-12">
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-content">
				<h3 class="hs-title text-center">Title</h3>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor
				</div>
				<div class="text-right">
					<a class="btn-ob" href="">read more</a>
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-image">
				<div class="wow fadeInUp">
					<img src="assets/images/service/servicedescription1.jpg" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 hs-content">
				<h3 class="hs-title text-center">Title</h3>
				<div>
					Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor
				</div>
				<div class="text-right">
					<a class="btn-ob" href="">read more</a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			our
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
			<div class="galleryContainer text-center">
				<div class="col-sm-4 col-xs-6 massage grid-item">
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
				<div class="col-sm-4 col-xs-6 massage grid-item">
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
				<div class="col-sm-4 col-xs-6 markup grid-item">
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
				<div class="col-sm-4 col-xs-6 massage grid-item">
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
				<div class="col-sm-4 col-xs-6 hair grid-item">
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
				<div class="col-sm-4 col-xs-6 markup grid-item">
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
				<div class="col-sm-4 col-xs-6 hair grid-item">
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
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
<div class="container-fluid highlight-service">
	<div class="container">
		<div class="our-service text-center">
			<h2 class="title-os">
				our
				<span>gallery</span>
			</h2>
		</div>
		<div class="clear"></div>
		<div class="our-service-box">
			<div class="owl-carousel owl-theme own-blog-service">
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/blog/blog1.jpg">
						<div class="ob-eff-content">
							<span>Content</span>
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								beauty
							</span>
							<span class="ob-time">
								2 Jan 2018	
							</span>
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor.....
						</div>
						<div class="text-right">
							<a href="" class="btn-ob">read more</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/blog/blog2.jpg">
						<div class="ob-eff-content">
							<span>Content</span>
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								beauty
							</span>
							<span class="ob-time">
								2 Jan 2018	
							</span>
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor.....
						</div>
						<div class="text-right">
							<a href="" class="btn-ob">read more</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/blog/blog3.jpg">
						<div class="ob-eff-content">
							<span>Content</span>
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								beauty
							</span>
							<span class="ob-time">
								2 Jan 2018	
							</span>
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor.....
						</div>
						<div class="text-right">
							<a href="" class="btn-ob">read more</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/blog/blog1.jpg">
						<div class="ob-eff-content">
							<span>Content</span>
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								beauty
							</span>
							<span class="ob-time">
								2 Jan 2018	
							</span>
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor.....
						</div>
						<div class="text-right">
							<a href="" class="btn-ob">read more</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/blog/blog2.jpg">
						<div class="ob-eff-content">
							<span>Content</span>
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								beauty
							</span>
							<span class="ob-time">
								2 Jan 2018	
							</span>
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor.....
						</div>
						<div class="text-right">
							<a href="" class="btn-ob">read more</a>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="ob-eff">
						<img src="assets/images/blog/blog3.jpg">
						<div class="ob-eff-content">
							<span>Content</span>
						</div>
					</div>
					<div class="ob-content">
						<div class="text-center">
							<span class="ob-title">
								beauty
							</span>
							<span class="ob-time">
								2 Jan 2018	
							</span>
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipiscing lorem impus dolorsit.onsectetur adipiscing lorem quis auctor.....
						</div>
						<div class="text-right">
							<a href="" class="btn-ob">read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			contact
			<span>us</span>
		</h2>
	</div>
	<div id="googleMap"></div>

	<div class="container text-center form-contact">
		<form>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" name="" placeholder="Your name" >
				<i class="fas fa-user"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" name="" placeholder="Company">
				<i class="fas fa-university"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="email" name="" placeholder="Email">
				<i class="fas fa-envelope"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" name="" placeholder="Phone">
				<i class="fas fa-phone"></i>
			</div>
			<div class="col-sm-12 col-xs-12 form-group last-fg">
				<textarea class="form-control" type="text" name="">
				</textarea>
				<i class="fas fa-paper-plane"></i>
			</div>
			<div class="col-sm-12 col-xs-12 form-group text-right">
				<input type="submit" name="">
			</div>
		</form>
	</div>
	<div class="clear"></div>
</div>

@endsection

@push('script')
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