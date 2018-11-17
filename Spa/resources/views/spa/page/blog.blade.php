 @extends('spa.master')

@section('title','Da Nang Spa')

@section('content')
<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Blog</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Home / Blog</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container blog-page">
		<div class="col-xs-10 col-xs-offset-1 col-sm-9 col-sm-offset-0" style="position: relative;margin-bottom: 10px;">
			<div class="owl-carousel owl-theme" id="blog-header">
				<div class="item">
					<img src="assets/images/blog/main.jpg">
				</div>
				<div class="item">
					<img src="assets/images/blog/main2.jpg">
				</div>
			</div>
			<div class="box-blog">
				<div class="box-content-blog">
					<div class="text-center bcb-top">
						<span class="title-bcb">
							WE’D LIKE TO INTRODUCE OUR NEW MOBILE APP
						</span>
						<span class="time-bcb">
							20 July 2015 / Beauty 
						</span>
					</div>
					<div class="bcb-body">
						<div>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est.
						</div>
						<div class="bcb-talk">
							" Sit ametctetur adipising elit, sed do eiusmod tempor incididint ut labore magna aliuua. Ut enim ad minim veniam, quis nosturd exercitation u, lamco laboris nisi ut aliquip "
						</div>
						<div>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est.
						</div>
					</div>
				</div>
			</div>
			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span>Feature posts</span>
					</div>
					<div class="blog-post-body text-center">
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 bpb-feature">
							<div class="bpb-img">
								<img src="assets/images/blog/featureblog1.jpg" width="100%">
							</div>
							<div class="bpb-title"><a href="">Fashion</a></div>
							<div class="bpb-time">
								Fashion &bull; 27, May 2016
							</div>
							<div class="bpb-content">
								Lorem ipsum dolor sit amet, that it consectetuer adipiscing elit. Aenean commodo ligula eget.
							</div>
						</div>
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 bpb-feature">
							<div class="bpb-img">
								<img src="assets/images/blog/featureblog2.jpg" width="100%">
							</div>
							<div class="bpb-title"><a href="">Massage</a></div>
							<div class="bpb-time">
								Massage &bull; 27, May 2016
							</div>
							<div class="bpb-content">
								Lorem ipsum dolor sit amet, that it consectetuer adipiscing elit. Aenean commodo ligula eget.
							</div>
						</div>
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 bpb-feature">
							<div class="bpb-img">
								<img src="assets/images/blog/featureblog3.jpg" width="100%">
							</div>
							<div class="bpb-title"><a href="">Fashion</a></div>
							<div class="bpb-time">
								Fashion &bull; 27, May 2016
							</div>
							<div class="bpb-content">
								Lorem ipsum dolor sit amet, that it consectetuer adipiscing elit. Aenean commodo ligula eget.
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="clear"></div>
			<!-- <div class="box-blog">
				<div class="blog-comment">
					<div class="bc-title"></div>
					<div class="bc-content">
						<div class="bc-name">
							John
						</div>
						<div class="bc-time">
							Mar 10, 2015
						</div>
						<div class="bc-content">
							<span class="bc-content-comment">
								This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed.
							</span>
							<span class="bc-content-reply">
								<a href=""><i class="fas fa-reply"></i></a>
							</span>
						</div>
						<div class="blog-comment">
							<div class="bc-title"></div>
							<div class="bc-content">
								<div class="bc-name">
									John
								</div>
								<div class="bc-time">
									Mar 10, 2015
								</div>
								<div class="bc-content">
									<span class="bc-content-comment">
										This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed.
									</span>
									<span class="bc-content-reply">
										<a href=""><i class="fas fa-reply"></i></a>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="bc-comment">
						<input type="text" name="">
						<a href=""><i class="fas fa-arrow-alt-from-left"></i></a>
					</div>
				</div>
			</div> -->

			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span>Leave a reply</span>
					</div>
				</div>

				<div class="text-center form-contact">
					<form>
						<div class="col-sm-6 col-xs-12 form-group">
							<input class="form-control" type="text" name="" placeholder="Your name" >
							<i class="fas fa-user"></i>
						</div>
						<div class="col-sm-6 col-xs-12 form-group">
							<input class="form-control" type="text" name="" placeholder="Address">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<div class="col-sm-12 col-xs-12 form-group last-fg">
							<input class="form-control" type="email" name="" placeholder="Email">
							<i class="fas fa-envelope"></i>
						</div>
						<div class="col-sm-12 col-xs-12 form-group last-fg">
							<textarea class="form-control" type="text" name="">
							</textarea>
							<i class="fas fa-paper-plane"></i>
						</div>
						<div class="col-sm-12 col-xs-12 form-group text-right">
							<input type="submit" name="" value="send message">
						</div>
					</form>
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<div class="col-xs-10 col-xs-offset-1 col-sm-3 col-sm-offset-0">
			<div class="box-category">
				<div class="box-category-top">
					Categories
				</div>
				<div class="box-category-body">
					<ul>
						<li><a href="">Beauty</a></li>
						<li><a href="">Face</a></li>
						<li><a href="">Hair</a></li>
						<li><a href="">Spa</a></li>
					</ul>
				</div>
			</div>
			<div class="box-category">
				<div class="box-category-top">
					instagram
				</div>
				<div class="box-category-body">
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta1.jpg" width="100%">
						</a>
					</div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta2.jpg" width="100%">
						</a>
					</div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta3.jpg" width="100%">
						</a>
					</div>
					<div class="clear"></div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta4.jpg" width="100%">
						</a>
					</div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta5.jpg" width="100%">
						</a>
					</div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta6.jpg" width="100%">
						</a>
					</div>
					<div class="clear"></div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta7.jpg" width="100%">
						</a>
					</div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta8.jpg" width="100%">
						</a>
					</div>
					<div class="col-sm-4 col-xs-4 box-category-img">
						<a href="">
							<img src="assets/images/blog/insta9.jpg" width="100%">
						</a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
			<div class="box-category">
				<div class="box-category-top">
					Recents posts
				</div>
				<div class="box-category-body">
					<div>
						<div class="col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-0 box-category-img">
							<img src="assets/images/blog/post1.jpg" width="100%">
						</div>
						<div class="col-xs-7 col-sm-8 bcb-box-recent">
							<span class="bcb-title">
								Makes your life easier
							</span>
							<span class="bcb-time">
								<i class="fas fa-calendar"></i> July 6, 2016
							</span>
							<span class="bcb-content">
								Lorem ipsum dolor sit consec te imperdiet
							</span>
						</div>
						<div class="col-xs-4 col-xs-offset-1 col-sm-4 col-sm-offset-0 box-category-img">
							<img src="assets/images/blog/post1.jpg" width="100%">
						</div>
						<div class="col-xs-7 col-sm-8 bcb-box-recent">
							<span class="bcb-title">
								Makes your life easier
							</span>
							<span class="bcb-time">
								<i class="fas fa-calendar"></i> July 6, 2016
							</span>
							<span class="bcb-content">
								Lorem ipsum dolor sit consec te imperdiet
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
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