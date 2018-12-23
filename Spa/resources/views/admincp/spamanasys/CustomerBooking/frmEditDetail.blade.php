@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}
@section('MenuBar_DashBoard','m-menu__item')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded')
@section('MenuBar_BookingForCustomer','m-menu__item')
@section('MenuBar_ListCustomerBooking','m-menu__item m-menu__item--active')
@section('MenuBar_TitleCustomerMember','m-menu__item m-menu__item--submenu')
@section('MenuBar_AddCustomerMember','m-menu__item')
@section('MenuBar_ListCustomerMember','m-menu__item')
@section('MenuBar_TitleStaffManagement','m-menu__item m-menu__item--submenu ')
@section('MenuBar_AddStaff','m-menu__item')
@section('MenuBar_ListStaff','m-menu__item')
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
						{{csrf_field()}}
						@if($customerBooking->CustomerMember == 1)
						<input type="hidden" name="idCustomer" value="{{$customerMember->CustomerMemberId}}">
						@else
						<input type="hidden" name="idCustomer" value="{{$customer->CustomerId}}">
						@endif
						<input type="hidden" name="idCustomerBooking" value="{{$customerBooking->CustomerBookingId}}">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Họ tên:
								</label>
								@if($customerBooking->CustomerMember == 1)
								<input type="text" value="{{$customerMember->CustomerMemberName}}" class="form-control m-input " disabled>
								@else
								<input type="text" name="CustomerName" value="{{$customer->CustomerName}}" class="form-control m-input">
								@endif
							</div>
							<div class="col-lg-4">
								<label class="">
									Số điện thoại:
								</label>
								@if($customerBooking->CustomerMember == 1)
								<input type="number" value="{{$customerMember->CustomerMemberPhoneNumber}}" class="form-control m-input" disabled>
								@else
								<input type="number" name="CustomerPhoneNumber" value="{{$customer->CustomerPhoneNumber}}" class="form-control m-input">
								@endif
							</div>
							<div class="col-lg-4">
								<label>
									Giới tính:
								</label>
								<div class="m-radio-inline">
									@if($customerBooking->CustomerMember == 1)
										@if($customerMember->CustomerMemberGender == 1) 
											{!!
												'<label class="m-radio m-radio--bold m-radio--state-info">
												<input type="radio" checked 
												>
												Nam
												<span></span>
												</label>'
											!!} 
										@else 
											{!!
												'<label class="m-radio m-radio--bold m-radio--state-danger">
												<input type="radio" checked 
												>
												Nữ
												<span></span>
												</label>' 
												!!}
										@endif
									@else
										@if($customer->CustomerGender == 1) 
											{!!
												'<label class="m-radio m-radio--bold m-radio--state-info">
													<input type="radio" name="gender" value="1" checked 
													>
													Nam
													<span></span>
												</label>
												<label class="m-radio m-radio--bold m-radio--state-danger">
												<input type="radio" name="gender" value="0"
												>
												Nữ
												<span></span>
												</label>'
											!!} 
										@else
											{!!
												'<label class="m-radio m-radio--bold m-radio--state-info">
													<input type="radio" name="gender" value="1"
													>
													Nam
													<span></span>
												</label>
												<label class="m-radio m-radio--bold m-radio--state-danger">
												<input type="radio"checked name="gender" value="0"
												>
												Nữ
												<span></span>
												</label>
												'
											!!}
										@endif
									@endif
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Phòng:
								</label>
								<center><div class="col-6" style="padding-bottom: 5px;color: white">
									<a class="btn btn-primary" id="btn-select-room" data-toggle="modal" data-target="#listroom">
										Chọn phòng
									</a>
								</div>
								</center>
								<div class="col-12">
									<input type="hidden" name="RoomOldId" value="{{$customerBooking->getRoom->RoomId}}">
									<input type="hidden" name="RoomId" value="{{$customerBooking->getRoom->RoomId}}">
									<input type="text" name="room_name" value="{{$customerBooking->getRoom->RoomName." [".$customerBooking->getRoom->getRoomType->RoomTypeName."]"}}" class="form-control m-input" disabled>
									
								</div>
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
									<input type="hidden" name="StaffOldId" value="{{$customerBooking->StaffId}}">
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
									<input type="datetime-local" name="CustomerBookingTime" class="form-control m-input col-lg-3" value="{{date("Y-m-d\TH:i:s",strtotime($customerBooking->CustomerBookingTime))}}">
								</div>
							</div>
						</div>
						<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
							<div class="m-form__actions m-form__actions--solid">
								<div class="row">
									<div class="col-lg-4"></div>
									<div class="col-lg-8">
										<button type="reset" class="btn btn-default" data-dismiss="modal">
											Đặt lại
										</button>
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

@endpush

@push('script_header')
	<script src="js/jquery-3.3.1.min.js"></script>
@endpush
	