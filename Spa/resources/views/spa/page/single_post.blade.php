@extends('spa.master')

@section('title','Da Nang Spa')

@section('content')
<div class="container-fluid page-name">
	<div class="container-fluid box-page">
		<div class="container box-title-page">
			<div class="col-sm-6 col-xs-12 title-page">Bài viết</div>
			<div class="col-sm-6 col-xs-12 full-title-page">Trang chủ / Bài viết</div>
		</div>
	</div>
</div>
<div class="container-fluid highlight-service" id="h-service">
	<div class="container blog-page">
		<div class="box-blog">
			
				
			<div class="blog-post">
				<div class="container our-service text-center">
					<h2 class="title-os">
						{{$post->title}}
					</h2>
				</div>
				<div class="blog-post-body text-center" >
					
					<div class="col-xs-10 col-xs-offset-1 col-sm-12 col-sm-offset-0 bpb-feature">
						<div class="bpb-time">
							{{$post->getPostType->ServicesName}} - {{date('d/m/Y', strtotime($post->created_at))}}
						</div>
						<div class="bpb-img" style="margin-bottom: 20px;">
							<img src="assets/images/posts/{{$post->image}}" width="100%">
						</div>
						<!-- <div class="bpb-title"><a href="">T</a></div> -->
						<div class="bpb-content" style="font-size: 1.7rem; text-align: justify;">
							{{$post->description}} 
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>
<div class="container-fluid highlight-service"">
	<div class="container blog-page">
		<div class="box-blog">
			<div class="blog-post">
				<div class="blog-post-top text-center">
					<div class="horizon-li"></div>
					<span>Bình luận bài viết</span>
				</div>
			</div>
		</div>
		<div class="box-comment">
			<div class="text-center form-comment">
				<form>
					<div class="col-sm-6 col-xs-12 form-group">
						<input class="form-control" type="text" id="name_comment" name="name_comment" placeholder="Họ tên" >
						<!-- <i class="fas fa-user"></i> -->
					</div>
					<div class="col-sm-6 col-xs-12 form-group">
						<input class="form-control" type="email" id="email_comment" name="email_comment" placeholder="Email" >
						<!-- <i class="fas fa-user"></i> -->
					</div>
					<div class="col-sm-12 col-xs-12 form-group">
						<textarea class="form-control" rows="5" id="message_comment" name="message_comment"></textarea>
						<i class="fas fa-paper-plane"></i>
					</div>
					<div class="col-sm-12 col-xs-12 form-group text-right">
						<input class="btn-book-service" type="button" id="comment_button" data-pid="{{$post->id}}" data-comurl="{{route('comment')}}" data-reurl="{{route('reply')}}" name="comment_button" value="Gửi bình luận">
					</div>
				</form>
			</div>
			<div class="clear"></div>
		</div>
		<div>
			@if(count($comments) > 0)
			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span><i id="numcom" data-numcom="{{count($allComments)}}">{{count($allComments)}}</i> Bình luận cho bài viết</span>
					</div>
				</div>
			</div>
			<div class="media" id="boxer-comment">
				@foreach($comments as $comment)
				<div class="col-sm-12 col-xs-12 boxcom">
					
				    <div class="media-left">
				      	<img src="assets/images/img_avatar1.png" class="media-object" style="width:45px">
				    </div>
				    <div class="media-body">
				    	<span style="display: none;">
					    	{{$numre = 0}}
					    	@foreach($replies as $rep)
					    	@if( $comment->id == $rep->comment_id )
					    	{!! $numre += 1 !!}
					    	@endif
					    	@endforeach
				    	</span>
				      	<h4 class="media-heading">{{$comment->name}} <small> <i>Posted on {{date('h:i:s-M d,y',strtotime($comment->created_at))}}</i></small> <small class="reply">Trả lời</small> @if($numre > 0)<small class="num-reply"> {{$numre}} câu trả lời cho bình luận này</small> @else <small style="display: none;" class="num-reply"></small>  @endif</h4>
				      	<p>{{$comment->message}}.</p>
				      
				      	<!-- Nested media object -->

				      	<div class="reply-box" style="display: none;">
					      	@foreach($replies as $reply)
					      	@if($comment->id == $reply->comment_id)
					      	<div class="media">
					        	<div class="media-left">
					          		<img src="assets/images/img_avatar1.png" class="media-object" style="width:45px">
					        	</div>
					        	<div class="media-body">
					          		<h4 class="media-heading">{{$reply->name}} <small> <i>Posted on {{date('h:i:s-M d,y',strtotime($reply->created_at))}}</i></small></h4>
					          		<p>{{$reply->message}}.</p>
					          
					        	</div>
					      	</div>
					      	@endif
					      	@endforeach
				      	</div>
				      	<div class="box-comment" style="display: none;">
							<div class="text-center form-comment">
								<form id="{{$comment->id}}">
									<div class="col-sm-6 col-xs-12 form-group">
										<input class="form-control name_reply" type="text" name="name_reply" placeholder="Họ tên" >
										<!-- <i class="fas fa-user"></i> -->
									</div>
									<div class="col-sm-6 col-xs-12 form-group">
										<input class="form-control email_reply" type="email" name="email_reply" placeholder="Email" >
										<!-- <i class="fas fa-user"></i> -->
									</div>
									<div class="col-sm-12 col-xs-12 form-group">
										<textarea class="form-control message_reply" rows="5" name="message_reply"></textarea>
										<i class="fas fa-paper-plane"></i>
									</div>
									<div class="col-sm-12 col-xs-12 form-group text-right">
										<input class="btn-book-service reply_button" type="button" data-pid="{{$post->id}}" data-reurl="{{route('reply')}}" data-numre="{{$numre}}" name="reply_button" value="Trả lời">
									</div>
								</form>
							</div>
							<div class="clear"></div>
						</div>
				    </div>
				</div>
				@endforeach
			</div>
			@if($id_comment > 0)
			<a type="button" class="load-comment" data-URL="{{route('comment')}}" data-loadURL="{{route('load-comment',[$id_comment,$post->id])}}" data-idPOST="{{$post->id}}">Tải thêm bình luận</a>
			@endif
			@else
			<div class="box-blog">
				<div class="blog-post">
					<div class="blog-post-top text-center">
						<div class="horizon-li"></div>
						<span> <i id="numcom" data-numcom="{{count($allComments)}}">{{count($allComments)}}</i> Bình luận cho bài viết</span>
					</div>
				</div>
			</div>
			{{-- <div class="reply-box" style="display: none;"></div> --}}
			<div class="media" id="boxer-comment"></div>
			@endif
		</div>
		<div class="clear"></div>
		
	</div>
</div>
		

@endsection

@push('script')
<script src="assets/js/javascript.js"></script>
<script src="assets/js/reply.js"></script>
<script src="assets/js/comment.js"></script>

<script src="assets/js/load-page.js"></script>
<script src="assets/dist/wow.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/carousel-custom.js"></script>
<script src="assets/js/gallery-custom.js"></script>
<script src="assets/js/wow-custom.js"></script>
<script src="assets/js/page-custom.js"></script>
@endpush