@extends('spa.spacms.master') 

@push('meta-code')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script-header')
<script src="spacms/assets/js/jquery-2.2.3.min.js"></script>
@endpush

@section('menu-bar--dashboard')
m-menu__item
@endsection

@section('menu-bar--class-collapse')
m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded
@endsection

@section('menu-bar--gallery')
m-menu__item
@endsection

@section('menu-bar--post')
m-menu__item
@endsection

@section('menu-bar--blog')
m-menu__item
@endsection

@section('menu-bar--service')
m-menu__item
@endsection

@section('menu-bar--feedback')
m-menu__item
@endsection

@section('menu-bar--comment')
m-menu__item  m-menu__item--active
@endsection

@section('head-title')
Bình luận
@endsection

@section('content')

<!-- BEGIN: Subheader -->
@include('spa.spacms.notifications')
<!-- END: Subheader -->
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						CHI TIẾT
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Datatable -->
			<table class="table table-bordered m-table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Họ tên
						</th>
						<th>
							Email
						</th>
						<th>
							Bình luận
						</th>
						<th>
							Bài viết
						</th>
						<th>
							{{-- Chi tiết --}}
						</th>
					</tr>
				</thead>
				@if(count($comments) > 0)
				<tbody>
					@foreach($comments as $comment)
					<tr>
						<th scope="row">
							{{$comment['id']}}
						</th>
						<td>
							{{$comment['name']}}
						</td>
						<td>
							{{$comment['email']}}
						</td>
						<td>
							{{$comment['message']}}
						</td>
						<td>
							{{$comment->getPostComment['title']}}
						</td>
						<td>
							<a class="btn btn-outline-accent m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" data-comid="{{$comment['id']}}" data-url="{{route('detail-comment-cms')}}" data-name="detail" data-toggle="modal" data-placement="top" data-target="#m_modal_2" title="Chi tiết">
								<i class="la la-info-circle" style="color: #ccc;"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				@else 
				<tbody>
					<tr>
						<th scope="row" colspan="6" class="text-center">
							Chưa có bình luận nào
						</th>
					</tr>
				</tbody>
				@endif
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>
<div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title m--font-danger" id="exampleModalLongTitle">
					Bình luận cho bài viết <b><i id="post-title"></i></b>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<div>
					<table class="table table-bordered m-table m-tableborder-success">
					<tbody id="data-comment">
						
					</tbody>
				</table>
				</div>
				<div id="header-reply" style="display: none;" class="m--font-danger">
					Có <b id="count-reply"></b> câu trả lời
				</div>
				<div>
					<table class="table table-bordered m-table m-tableborder-success">
					<tbody id="data-reply">
						
					</tbody>
				</table>
				</div>

			</div>
		</div>
	</div>
</div>

<!--End::Main Portlet-->

@endsection

@push('scripts')
<script src="spacms/assets/js/comment.js"></script>
{{-- <script src="spacms/assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script> --}}
@endpush