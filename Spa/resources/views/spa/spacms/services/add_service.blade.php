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
m-menu__item  m-menu__item--active
@endsection

@section('menu-bar--feedback')
m-menu__item
@endsection

@section('menu-bar--comment')
m-menu__item
@endsection

@section('head-title')
Thêm dịch vụ
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
						THÊM
					</h3>
				</div>
			</div>
		</div>
		
		<div class="m-portlet m-portlet--tab">
			<form class="m-form m-form--fit m-form--label-align-right" method="post" id="frm-add" action="{{route('post-add-service')}}" enctype="multipart/form-data">
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<div class="m-portlet__body">

					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label">
							Tiêu đề
						</label>
						<div class="col-10">
							<input class="form-control m-input" type="text" name="title_service" value="{{old('title_service')}}">
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label">
							Mô tả
						</label>
						<div class="col-10">
							<textarea name="description_service" class="form-control" data-provide="markdown" rows="10"></textarea>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label"> 
							Loại dịch vụ
						</label>
						<div class="col-10">
							<select class="form-control m-input" name="type_service" id="exampleSelect1">
								@foreach($serviceType as $service)
								<option value="{{$service->ServicesId}}">
									{{$service->ServicesName}}
								</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label">
							Giá
						</label>
						<div class="col-10">
							<input class="form-control m-input" type="number" name="price_service" value="{{old('description_service')}}">
						</div>
					</div>
					<div class="m-form__group form-group row">
						<label for="" class="col-2 col-form-label">
							Vị trí
						</label>
						<div class="m-radio-inline col-10">
							<label class="m-radio">
								<input type="radio" name="aside_service" value="1" checked>
								Phải
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="aside_service" value="2">
								Giữa
								<span></span>
							</label>
							<label class="m-radio">
								<input type="radio" name="aside_service" value="3">
								Trái
								<span></span>
							</label>
						</div>
					</div>
					<div class="form-group m-form__group row">
						<label class="col-2 col-form-label">
							Ảnh
						</label>
						<div class="col-2 custom-file">
							<input type="file" id="file2" name="image_service" accept="image/*" class="custom-file-input" style="opacity: 1; height: 2rem;">
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__foot--fit">
						<div class="m-form__actions">
							<button type="submit" id="add" class="btn btn-primary">
								Thêm
							</button>
							<button type="reset" id="reset" class="btn btn-info">
								Reset
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
<script>
	$(document).ready(function() {
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