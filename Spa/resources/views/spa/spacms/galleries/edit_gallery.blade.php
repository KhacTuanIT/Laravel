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
m-menu__item  m-menu__item--active
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
Chỉnh sửa bộ sưu tập
@endsection

@section('content')
<style>
.col-form-label {
	text-align: left;
}
.m-form.m-form--label-align-right .m-form__group>label {
	text-align: left;
}
</style>

<!-- BEGIN: Subheader -->

<!-- END: Subheader -->
@include('spa.spacms.notifications')
<div class="m-content">

	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						CHỈNH SỬA
					</h3>
				</div>
			</div>
		</div>
		
		<div class="m-portlet m-portlet--tab">
			<form class="m-form m-form--fit m-form--label-align-right" method="post" id="frm-add" action="{{route('edited-gallery')}}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="m-portlet__body">
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							ID
						</label>
						<div class="col-10">
							<input class="form-control m-input" type="text" name="id_gallery" value="{{$gallery->id}}" id="example-text-input" readonly>
							<div id="title-error" class="m--font-danger"></div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-text-input" class="col-2 col-form-label">
							Tiêu đề
						</label>
						<div class="col-10">
							<input class="form-control m-input" type="text" name="title_gallery" value="{{$gallery->title}}" id="example-text-input">
							<div id="title-error" class="m--font-danger"></div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="example-search-input" class="col-2 col-form-label">
							Mô tả
						</label>
						<div class="col-10">
							<textarea name="description_gallery" class="form-control" data-provide="markdown" rows="10">{{$gallery->description}}</textarea>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label for="exampleSelect1" class="col-2 col-form-label"> 
							Loại dịch vụ
						</label>
						<div class="col-10">
							<select class="form-control m-input" name="type_gallery" id="typeSelect">
								
								@foreach($services as $service)
								@if($servicesActive->ServicesName != $service->ServicesName)
								<option value="{{$service->ServicesId}}">
									{{$service->ServicesName}}
								</option>
								@else 
								<option value="{{$service->ServicesId}}" selected>
									{{$service->ServicesName}}
								</option>
								@endif
								@endforeach
							</select>
							<div id="type-error" class="m--font-danger"></div>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label"> 
							Loại
						</label>
						<div class="m-radio-inline col-10">
							<label class="m-radio">
								<input type="radio" name="type_s" value="massage" @if($gallery->type == "massage") checked @endif>
								Massage
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="type_s" value="markup" @if($gallery->type == "markup") checked @endif>
								Markup
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="type_s" value="beautiful" @if($gallery->type == "beautiful") checked @endif>
								Beautiful
								<span></span>
							</label>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label">
							Ảnh
						</label>
						<div class="col-10">
							<div class="row">
								<div id="img_checkbox" class="col-2" >
									<input type="checkbox" name="img_check" id="img_check" value="off">
								</div>
								<div class="col-2" style="display: none;" id="box_imgedit">
									<input type="file" id="file2" name="image_gallery" accept="image/*" class="custom-file-input" style="opacity: 1; height: 2rem;" value="{{public_path().'/source/spa/assets/images/galleries/'.$gallery->image}}">								
								</div>
							</div>
						</div>
						<div style="clear: both;"></div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<button type="submit" id="edit" class="btn btn-metal">
								Sửa
							</button>
						</div>
					</div>
				</div>

			</form>
			
		</div>
	</div>
</div>

<!--End::Main Portlet-->

@endsection

@push('scripts')
<script src="spacms/assets/js/edit.js"></script>
<script>
	$(document).ready(function() {
		$('#file2').change(function() {
			$('#box-img-temp').fadeOut();
		});
		$('input[name="title-Gallery"]').keyup(function(){
			$('#title-error').text('');
		});
		$('input[name="image-Gallery"]').mouseup(function(){
			$('#image-error').text('');
		});
		$('input[name="type-Gallery"]').hover(function(){
			$('#type-error').text('');
		});
	});
</script>

{{-- <script src="assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script> --}}
@endpush