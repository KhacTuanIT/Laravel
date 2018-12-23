 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Bộ sưu tập</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Bộ sưu tập</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			<span>Bộ sưu tập</span>
		</h2>
		<span class="content-os">
			{{$service_hot[0]->description}}
		</span>
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
									<span class="time-service">{{$gallery->created_at}}</span>
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

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
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

@endsection

@push('script')
<script src="assets/js/javascript.js"></script>
<script src="assets/js/reservation.js"></script>
<script src="assets/js/load-page.js"></script>
<script src="assets/dist/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/carousel-custom.js"></script>
<script src="assets/js/gallery-custom.js"></script>
<script src="assets/js/page-custom.js"></script>
@endpush