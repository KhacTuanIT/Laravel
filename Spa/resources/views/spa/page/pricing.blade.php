 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Pricing</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Home / Pricing</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			our
			<span>Pricing</span>
		</h2>
		<span class="content-os">
			This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
		</span>
	</div>
	<div class="container">
		<div class="col-sm-12 pricing-box">
			<div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-0">
				<div>
					<img src="assets/images/service/servicedescription2.jpg" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 pricing-service">
				<h3 class="text-center ms-pricing-title">Massage pricing list</h3>
				<div class="ms-pricing-list">
					<div class="ms-pricing-box">
						<ul>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li class="ms-li-last">
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="text-center">
					<a class="btn-book-service" href="{{route('pricing')}}#make-an-appoinment">Make an appoinment</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os" id="make-an-appoinment">
			Make an appoinment
		</h2>
	</div>
	<div class="container appoinment form-contact">
		<form>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" name="" placeholder="Your name" >
				<i class="fas fa-user"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" name="" placeholder="Address">
				<i class="fas fa-map-marker-alt"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="email" name="" placeholder="Email">
				<i class="fas fa-envelope"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
                <input class="form-control" type="datetime-local" id="meeting-time" name="meeting-time" value="" min="2018-06-07" max="2018-06-14">
                <i class="fas fa-calendar"></i>
       		</div>
       		<div class="col-sm-6 col-xs-12 form-group">
				<select>
					<option>Services</option>
					<option value="Massage">Massage</option>
					<option>Hair</option>
					<option>Markup</option>
					<option>Nail</option>
				</select>
				<i class="fas fa-sort-down"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<select>
					<option>Gender</option>
					<option value="Massage">male</option>
					<option>Female</option>
				</select>
				<i class="fas fa-male"></i>
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
</div>

<div class="container-fluid section" id="h-service">
	<div class="container">
		<div class="col-sm-12 pricing-box">
			<div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-0">
				<div class="wow fadeInLeft">
					<img src="assets/images/service/servicedescription2.jpg" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 pricing-service">
				<h3 class="text-center ms-pricing-title">Spa pricing list</h3>
				<div class="ms-pricing-list">
					<div class="ms-pricing-box">
						<ul>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li>
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
							<li class="ms-li-last">
								<span class="ms-name-list">
									Color Rince
								</span>
								<span class="ms-price-list">
									&#36;15
								</span>
							</li>
						</ul>
					</div>
				</div>
				<div class="text-center">
					<a class="btn-book-service" href="{{route('pricing')}}#make-an-appoinment">Make an appoinment</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			choose our
			<span>plans</span>
		</h2>
	</div>
	<div class="container">
		<div class="col-sm-4 col-xs-10 col-xs-offset-1 col-sm-offset-0">
			<div class="price-box">
				<div class="text-center pb-top">
					<span class="pb-name-service">Massage</span>
					<span class="pb-price-service">
						<span>free</span>
						/ month
					</span>
				</div>
				<div class="text-center pd-content-service">
					<ul>
						<li>Full Body Massage</li>
						<li>Skin Treatment</li>
						<li>Hot Stone Massage</li>
						<li>Hair Treatment</li>
						<li>Reflexology</li>
					</ul>
				</div>
				<div class="text-center">
					<a href="#make-an-appoinment" class="btn-book-service">book now</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-10 col-xs-offset-1 col-sm-offset-0">
			<div class="price-box">
				<div class="text-center pb-top">
					<span class="pb-name-service">Massage</span>
					<span class="pb-price-service">
						<span>free</span>
						/ month
					</span>
				</div>
				<div class="text-center pd-content-service">
					<ul>
						<li>Full Body Massage</li>
						<li>Skin Treatment</li>
						<li>Hot Stone Massage</li>
						<li>Hair Treatment</li>
						<li>Reflexology</li>
					</ul>
				</div>
				<div class="text-center">
					<a href="#make-an-appoinment" class="btn-book-service">book now</a>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-10 col-xs-offset-1 col-sm-offset-0">
			<div class="price-box">
				<div class="text-center pb-top">
					<span class="pb-name-service">Massage</span>
					<span class="pb-price-service">
						<span>free</span>
						/ month
					</span>
				</div>
				<div class="text-center pd-content-service">
					<ul>
						<li>Full Body Massage</li>
						<li>Skin Treatment</li>
						<li>Hot Stone Massage</li>
						<li>Hair Treatment</li>
						<li>Reflexology</li>
					</ul>
				</div>
				<div class="text-center">
					<a href="{{route('pricing')}}#make-an-appoinment" class="btn-book-service">book now</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
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