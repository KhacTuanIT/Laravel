@extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Giá</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Giá</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>Giá dịch vụ</span>
		</h2>
		<span class="content-os">
			{{$service_hot[0]->description}}
		</span>
	</div>
	<div class="container">
		<div class="col-sm-12 pricing-box">
			<div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-0">
				<div>
					<img src="assets/images/services/{{$service_img[rand(0,5)]->image}}" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 pricing-service">
				<h3 class="text-center ms-pricing-title">Danh sách giá</h3>
				<div class="ms-pricing-list">
					<div class="ms-pricing-box">
						<ul>
							@foreach($services as $service)
							<li>
								<span class="ms-name-list">
									{{$service->ServicesName}}
								</span>
								<span class="ms-price-list">
									VND {{$service->ServicesPrice}}
								</span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="text-center">
					<a class="btn-book-service" href="{{route('pricing')}}#make-an-appoinment">Tạo đơn hàng</a>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os" id="make-an-appoinment">
			Tạo đơn hàng
		</h2>
	</div>
	<div class="container appoinment form-contact">
		<form>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="text" id="reser_name" name="reser_name" placeholder="Họ tên" >
				<i class="fas fa-user"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="tel" pattern="[0-9]{4} [0-9]{3} [0-9]{3}" id="reser_phone" name="reser_phone" placeholder="Số điện thoại">
				<i class="fas fa-phone"></i>
			</div>
			<div class="col-sm-6 col-xs-12 none-margin" id="reser_name-err"></div>
			<div class="col-sm-6 col-xs-12 none-margin" id="reser_phone-err"></div>
			<div class="col-sm-6 col-xs-12 form-group">
				<input class="form-control" type="email" id="reser_email" name="reser_email" placeholder="Email">
				<i class="fas fa-envelope"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
                <input class="form-control" type="datetime-local" id="reser_date" name="reser_date" min="2018-06-07" max="2018-06-14">
                <i class="fas fa-calendar"></i>
       		</div>
			<div class="col-sm-6 col-xs-12 none-margin" id="reser_email-err"></div>
			<div class="col-sm-6 col-xs-12 none-margin" id="reser_date-err"></div>
       		<div class="col-sm-6 col-xs-12 form-group">
				<select name="reser_service" id="reser_service">
					{{-- <option>Dịch vụ</option> --}}
					@foreach($services as $service)
					<option value="{{$service->ServicesId}}">{{$service->ServicesName}}</option>
					@endforeach
				</select>
				<i class="fas fa-sort-down"></i>
			</div>
			<div class="col-sm-6 col-xs-12 form-group">
				<select name="reser_gender" id="reser_gender">
					{{-- <option>Giới tính</option> --}}
					<option value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
					<option value="Khác">Khác</option>
				</select>
				<i class="fas fa-male"></i>
			</div>
			<div class="col-sm-12 col-xs-12 form-group last-fg">
				<textarea class="form-control" type="text" name="reser_message">
				</textarea>
				<i class="fas fa-paper-plane"></i>
			</div>
			<div class="col-sm-12 col-xs-12 form-group text-right">
				<input type="button" name="submit" data-url="{{route('reservation')}}" id="reser-button" value="Đăng ký">
			</div>
		</form>
	</div>
</div>

<div class="container-fluid section" id="h-service">
	<div class="container">
		<div class="col-sm-12 pricing-box">
			<div class="col-xs-10 col-xs-offset-1 col-sm-7 col-sm-offset-0">
				<div class="wow fadeInLeft">
					<img src="assets/images/services/{{$service_img[rand(0,2)]->image}}" width="100%">
				</div>
			</div>
			<div class="col-xs-10 col-xs-offset-1 col-sm-5 col-sm-offset-0 pricing-service">
				<h3 class="text-center ms-pricing-title">Danh sách giá</h3>
				<div class="ms-pricing-list">
					<div class="ms-pricing-box">
						<ul>
							@foreach($services as $service)
							<li>
								<span class="ms-name-list">
									{{$service->ServicesName}}
								</span>
								<span class="ms-price-list">
									VND {{$service->ServicesPrice}}
								</span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="text-center">
					<a class="btn-book-service" href="{{route('pricing')}}#make-an-appoinment">Tạo đơn hàng</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@push('script')
<script src="assets/js/javascript.js"></script>
<script src="assets/js/reservation.js"></script>
<script src="assets/js/load-page.js"></script>
<script src="assets/dist/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/carousel-custom.js"></script>
<script src="assets/js/gallery-custom.js"></script>
<script src="assets/js/wow-custom.js"></script>
<script src="assets/js/page-custom.js"></script>
@endpush
