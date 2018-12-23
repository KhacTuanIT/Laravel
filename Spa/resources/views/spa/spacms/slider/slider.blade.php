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
m-menu__item  m-menu__item--submenu
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
m-menu__item
@endsection

@section('head-title')
Slider
@endsection

@section('content')

<!-- BEGIN: Subheader -->
@include('spa.spacms.notifications')
<!-- END: Subheader -->
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__body">
			<!--begin: Search Form -->
			<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
				<div class="row align-items-center">
					<div class="col-xl-8 order-2 order-xl-1">
						<div class="form-group m-form__group row align-items-center">
							<div class="col-md-10">
								<h3 class="">
									Danh sách
								</h3>
							</div>
						</div>
					</div>
					<div class="col-xl-4 order-1 order-xl-2 m--align-right">
						<a href="{{route('get-add-slider')}}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
							<span>
								<i class="fa fa-picture-o"></i>
								<span>
									Thêm ảnh
								</span>
							</span>
						</a>
						<div class="m-separator m-separator--dashed d-xl-none"></div>
					</div>
				</div>
			</div>
			<!--end: Search Form -->
			<!--begin: Datatable -->
			<div class="m-content">
				<div class="row">
				@foreach($sliders as $slider)
				<div class="col-xl-4">
					<!--begin:: Widgets/Top Products-->
					<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
										{{$slider->image}}
									</h3>
								</div>
							</div>
							<div class="m-portlet__head-tools">
								<ul class="m-portlet__nav">
									<li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
										<a data-url="{{route('get-delete-slider',$slider->id)}}" data-t="{{$slider->image}}" class="b-d btn btn-outline-danger m-btn m-btn--icon m-btn--icon-only m-btn--outline" id="del" data-toggle="modal" data-target="#modal_delete" title="Delete">
											<i class="la la-close"></i> 
										</a>	
									</li>
								</ul>
							</div>
						</div>
						<div class="m-portlet__body">
							<img src="spa/assets/images/sliders/{{$slider->image}}" width="100%">
						</div>
					</div>
					<!--end:: Widgets/Top Products-->
				</div>
				@endforeach
				</div>
			</div>
			<!--end: Datatable -->
		</div>
	</div>

	<div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						Bạn thực sự muốn xoá <b id="title-del"></b>
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
{{-- <script src="spacms/assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script> --}}
@endpush