 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')

<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Gallery</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Home / Gallery</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
			our
			<span>gallery</span>
		</h2>
		<span class="content-os">
			This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit.
		</span>
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

<div class="container-fluid section">
	<div class="container our-service text-center">
		<h2 class="title-os">
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
				<input class="form-control" type="text" name="" placeholder="Company">
				<i class="fas fa-university"></i>
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