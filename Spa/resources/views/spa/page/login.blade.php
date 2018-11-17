 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid">
	<div class="container login">
		<div class="login-form">
			<h1>Sign in</h1>
		    <form method="post">
		    	<input type="text" name="u" placeholder="Username" required="required" />
		        <input type="password" name="p" placeholder="Password" required="required" />
		        <a type="submit" class="btn btn-primary btn-block btn-large">Sign in</a>
		    </form>
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