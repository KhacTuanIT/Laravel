 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Liên hệ</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Liên hệ</div>
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

{{-- <div class="container-fluid place-company">
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
</div> --}}

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
<script src="assets/js/page-custom.js"></script>
@endpush