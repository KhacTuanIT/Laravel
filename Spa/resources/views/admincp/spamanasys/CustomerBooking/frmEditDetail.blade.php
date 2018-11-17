@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}
@section('MenuBar_DashBoard','m-menu__item  m-menu__item--active')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu')
@section('MenuBar_BookingForCustomer','m-menu__item')
{{-- END MENU BAR --}}



@section('titlePage','Xem chi tiết')
@section('headTitle','Xem chi tiết')


@section('content')

<div class="m-content">
	<!--Begin::Main Portlet-->
	<div class="row">
		<div class="col-lg-12">
			<div class="m-portlet" >
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								THÔNG TIN CHI TIẾT KHÁCH HÀNG
							</h3>
						</div>
					</div>
					<div style="text-align: right; padding: 23px; padding-right: 15px; text-transform: uppercase; font-weight: bold;">
						<span>Chỉnh sửa</span>
					</div>
					<div class="m-portlet__head-tools" style="width: 35px;">
						
						{{-- /*<span style="display: inline-block; line-height: 38px; text-align: left;">CHỈNH SỬA</span>*/ --}}
						<span class="m-switch m-switch--outline m-switch--icon m-switch--danger m-switch--sm ">
							<label style="margin: 0;">
								{{-- <input id="edit" type="checkbox" checked="checked"> --}}
								<span></span>
							</label>
						</span>
					</div>
				</div>
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="Rowpage">
					<div class="m-portlet__body"  id="pageContent">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Họ tên:
								</label>
								<input type="text" name="CustomerName" value="{{$customer->CustomerName}}" class="form-control m-input">
							</div>
							<div class="col-lg-4">
								<label class="">
									Số điện thoại:
								</label>
								<input type="number" name="CustomerPhoneNumber" value="{{$customer->CustomerPhoneNumber}}" class="form-control m-input">
							</div>
							<div class="col-lg-4">
								<label>
									Giới tính:
								</label>
								<div class="m-radio-inline">
									<label class="m-radio m-radio--bold m-radio--state-info">
										<input type="radio" name="gender" value="1" @if($customer->CustomerGender == 1) {{'checked'}} @endif>
										Nam
										<span></span>
									</label>
									<label class="m-radio m-radio--bold m-radio--state-danger">
										<input type="radio" name="gender" value="0" @if($customer->CustomerGender == 0) {{'checked'}} @endif>
										Nữ
										<span></span>
									</label>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Phòng:
								</label>
								<input type="email" name="RoomId" value="{{$customerBooking->getRoom->RoomName}}" class="form-control m-input">
							</div>
							<div class="col-lg-4">
								<label class="">
									Dịch vụ sử dụng:
								</label>

								<div class="m-input-icon m-input-icon--right">
									<div class="m-checkbox-list">
										@foreach($listServices as $value)
										<label class="m-checkbox">
											<input type="checkbox" name="ServicesId[]" value="{{$value->ServicesId}}"
											@foreach($servicesSelected as $vlCusSelected)
												@if($vlCusSelected->ServicesId == $value->ServicesId)
													{{'checked'}}
												@endif
											@endforeach
											>
											{{$value->ServicesName}}
											<span></span>
										</label>
										@endforeach
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<label>
									Nhân viên tiếp nhận:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<select name="StaffId" class="form-control m-input"  required >
										@foreach($listStaff as $value)
										<option value="{{$value->StaffId}}"
										@if($value->StaffId == $customerBooking->StaffId)
											{{'selected'}}
										@endif
										 {{ old('StaffId') == $value->StaffId ? "selected" : "" }}
										 >
										 	{{$value->StaffName}}
										</option>
										@endforeach()
									</select>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label class="col-lg-12">
									Thời gian tiếp nhận:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" name="CustomerBookingTime" class="form-control m-input" value="{{date("H:i d-m-Y",strtotime($customerBooking->CustomerBookingTime))}}">
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-bookmark-o"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
										<button type="submit" class="btn btn-primary">
											Chỉnh sửa
										</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

@endsection

@push('scripts')
<script src="assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
	});
</script>
</script>

@endpush

@push('script_header')
	<script src="js/jquery-3.3.1.min.js"></script>
@endpush
	