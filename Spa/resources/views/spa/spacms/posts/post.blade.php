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
m-menu__item  m-menu__item--active
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
m-menu__item
@endsection

@section('head-title')
Bài viết
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
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-10">
								<div class="m-input-icon m-input-icon--left">
									<input type="text" class="form-control m-input m-input--solid" placeholder="Search..." id="generalSearch">
									<span class="m-input-icon__icon m-input-icon__icon--left">
										<span>
											<i class="la la-search"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="{{route('get-add-post')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
							<span>
								<i class="fa fa-newspaper-o"></i>
								<span>
									Thêm bài viết
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
			<!--begin: Datatable -->
			<table class="m-datatable" id="html_table" width="100%">
				<thead>
					<tr>
						<th title="Field #2">
							Tiêu đề
						</th>
						<th title="Field #3">
							Mô tả
						</th>
						<th title="Field #4">
							Loại dịch vụ
						</th>
						<th title="Field #5">
							Ảnh
						</th>
						<th>

						</th>
					</tr>
				</thead>
				<tbody>
					@foreach($posts as $post)
					<tr>
						<td>
							{{$post->title}}
						</td>
						<td>
							{{$post->description}}
						</td>
						<td>
							{{$post->getPostType->ServicesName}}
						</td>
						<td>
							<img src="spa/assets/images/posts/{{$post->image}}" width="100px" height="100px">
						</td>
						<td data-field="Actions" class="m-datatable__cell">
							<span style="overflow: visible; width: 110px;" >
								<a href="{{route('get-edit-post',$post->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">
									<i class="la la-edit"></i>
								</a>
								<a data-url="{{route('get-delete-post',$post->id)}}" data-t="{{$post->title}}" class="b-d delete-gallery m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" id="del" data-toggle="modal" data-target="#modal_delete" title="Delete">
									<i class="la la-trash"></i> 
								</a>
							</span>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			<!--end: Datatable -->
		</div>
	</div>


	<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Bạn thực sự muốn xoá bài viết <b id="title-del"></b>
					</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						Không
					</button>
					<a class="btn btn-danger" id="del-modal" href="">
						Có
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<!--End::Main Portlet-->

@endsection

@push('scripts')
<script src="spacms/assets/js/popup.js"></script>
<script src="spacms/assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
@endpush