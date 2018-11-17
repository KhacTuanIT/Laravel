 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Contact</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Home / Contact</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<!-- <div class="container our-service text-center">
		<h2 class="title-os">
			contact
			<span>us</span>
		</h2>
	</div> -->
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

<div class="container-fluid place-company">
	<div class="container-fluid place-company-box">
		<div class="container place-box">
			<div class="col-sm-4 col-xs-12 text-center place-item">
				<div class="place-city">Los Angeles</div>
				<div class="place-address">
					<span>156/157 Angel Street, Nr.East Park</span>
					<span>(123) - 4567 891</span>
					<span><a href="">demo@phoenixcoded.com</a></span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 text-center place-item">
				<div class="place-city">Los Angeles</div>
				<div class="place-address">
					<span>156/157 Angel Street, Nr.East Park</span>
					<span>(123) - 4567 891</span>
					<span><a href="">demo@phoenixcoded.com</a></span>
				</div>
			</div>
			<div class="col-sm-4 col-xs-12 text-center place-item">
				<div class="place-city">Los Angeles</div>
				<div class="place-address">
					<span>156/157 Angel Street, Nr.East Park</span>
					<span>(123) - 4567 891</span>
					<span><a href="">demo@phoenixcoded.com</a></span>
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