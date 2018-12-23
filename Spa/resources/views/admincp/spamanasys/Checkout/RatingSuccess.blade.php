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



@section('titlePage','Đánh giá nhân viên')
@section('headTitle','Đánh giá nhân viên')
@section('typePage')
<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
	<li class="m-nav__item m-nav__item--home">
		<a href="#" class="m-nav__link m-nav__link--icon">
			<i class="m-nav__link-icon la la-home"></i>
		</a>
	</li>
	<li class="m-nav__separator">
		-
	</li>
	<li class="m-nav__item">
		<a href="{{ route('spa_showDashBoard') }}" class="m-nav__link">
			<span class="m-nav__link-text">
				Bảng điều khiển
			</span>
		</a>
	</li>
	<li class="m-nav__separator">
		-
	</li>
{{-- 	<li class="m-nav__item">
		<a href="{{ route('spa_showCustomer') }}" class="m-nav__link">
			<span class="m-nav__link-text">
				Khách hàng đang được phục vụ
			</span>
		</a>
	</li>
	<li class="m-nav__separator">
		-
	</li>
	<li class="m-nav__item">
		<a href="{{ route('spa_showCustomer') }}" class="m-nav__link">
			<span class="m-nav__link-text">
				Khách hàng đang được phục vụ
			</span>
		</a>
	</li> --}}
</ul>
@endsection

@section('content')

<div class="m-content" id="checkout">
	<!--Begin::Main Portlet-->
	<div class="row" id="bill">
		<div class="col-lg-12">
			<div class="m-portlet" >
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								Đánh giá nhân viên
							</h3>
						</div>
					</div>
					<div class="m-portlet__head-tools" style="width: 35px;">
						<span class="m-switch m-switch--outline m-switch--icon m-switch--danger m-switch--sm ">
							<label style="margin: 0;">
								<span></span>
							</label>
						</span>
					</div>
				</div>
				<div class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="checkout">
					<div class="m-portlet__body">
						<div class="form-group m-form__group row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-6">
									<h3 style="text-align: center;color: green;font-weight: bold" >ĐÁNH GIÁ THÀNH CÔNG</h3>
								<div style="padding-top: 20px"></div>
								<table class="table">
									<tr>
										<th>Họ và tên:</th>
										<th>{{$staff->StaffName}}</th>
									</tr>
									<tr>
										<th>Số điện thoại:</th>
										<th>{{$staff->StaffPhoneNumber}}</th>
									</tr>
									<tr>
										<th>Giới tính: </th>
										<th>
											{{$staff->StaffGender}}
										</th>
									</tr>
									<tr>
										<th>Điểm Rating: </th>
										<th id="RatingPoint">
											{{$staff->StaffRating." (+".$startLastRate.")"}}
										</th>
									</tr>
								</table>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<a href="{{ route('spa_showDashBoard') }}" class="btn btn-primary">
										Trang chủ
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
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
