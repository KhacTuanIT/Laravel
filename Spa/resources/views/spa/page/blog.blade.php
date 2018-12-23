@extends('spa.master')

@section('title','Da Nang Spa')

@section('content')
<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Blog</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Blog</div>
		</div>
	</div>
</div>

<div class="container-fluid section">
	<div class="container blog-page">
		<div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0" style="position: relative;margin-bottom: 10px;">
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
							{{$blog[0]->title}}
						</span>
						<span class="time-bcb">
							{{$blog[0]->created_at}}
						</span>
					</div>
					<div class="bcb-body">
						<div>
							{{$blog[0]->description}}
						</div>
						<div class="bcb-talk">
							" {{$blog[0]->note}} "
						</div>
						@for($i = 1; $i < count($blog); $i++)
						<div>
							{{$blog[$i]->description}}
						</div>
						@endfor
					</div>
				</div>
			</div>
			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span>Bài viết</span>
					</div>
					<div class="blog-post-body text-center">
						@foreach($posts as $post)
						<div class="col-xs-10 col-xs-offset-1 col-sm-4 col-sm-offset-0 bpb-feature">
							<div class="bpb-img">
								<img src="assets/images/posts/{{$post->image}}" width="100%">
							</div>
							<div class="bpb-title"><a href="{{route('post-single',$post->id)}}">{{$post->title}}</a></div>
							<div class="bpb-time">
								{{$post->getPostType->ServicesName}} - {{date('d/m/Y', strtotime($post->created_at))}}
							</div>
							<div class="bpb-content">
								{{substr($post->description,0,97)}} [...]
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>


<div class="container-fluid" style="padding: 0;">
	<div class="our-service-box">
		<div class="owl-carousel owl-theme own-img-service">
			@foreach($sliders as $slider)
			<div class="item">
				<div class="ob-eff">
					<img src="assets/images/sliders/{{$slider->image}}">
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
@endsection

@push('script')
<script src="assets/js/load-page.js"></script>
<script src="assets/dist/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/carousel-custom.js"></script>
<script src="assets/js/gallery-custom.js"></script>
<script src="assets/js/page-custom.js"></script>
@endpush