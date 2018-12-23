@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}

@section('MenuBar_DashBoard','m-menu__item')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu')
@section('MenuBar_BookingForCustomer','m-menu__item')
@section('MenuBar_ListCustomerBooking','m-menu__item')
@section('MenuBar_Search','m-menu__item')
@section('MenuBar_TitleCustomerMember','m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded')
@section('MenuBar_AddCustomerMember','m-menu__item')
@section('MenuBar_ListCustomerMember','m-menu__item m-menu__item--active')
@section('MenuBar_TitleStaffManagement','m-menu__item m-menu__item--submenu ')
@section('MenuBar_AddStaff','m-menu__item')
@section('MenuBar_ListStaff','m-menu__item')
{{-- END MENU BAR --}}



@section('titlePage','danh sách KHTV')
@section('headTitle','Danh sách khách hàng thành viên')
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
	<li class="m-nav__item">
		<a href="{{ route('spa_showSearch') }}" class="m-nav__link">
			<span class="m-nav__link-text">
				Danh sách Khách hàng thành viên của SPA
			</span>
		</a>
	</li>
</ul>
@endsection

@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="m-content">
			<div class="m-portlet m-portlet--mobile">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text" id="textTitle">
								Danh sách khách hàng thành viên
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
									<div class="col-xl-4 order-1 order-xl-2 m--align-left">
									</div>
									<div class="col-md-4">
										<div class="m-input-icon m-input-icon--left">
											<input type="text" class="form-control m-input m-input--solid" placeholder="Tìm kiếm..." id="generalSearch">
											<span class="m-input-icon__icon m-input-icon__icon--left">
												<span>
													<i class="la la-search"></i>
												</span>
											</span>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end: Search Form -->
					<!--begin: Datatable -->
					<table class="m-datatable" id="html_table" width="100%">
						<thead>
							<tr>
								<th>
									Mã KH
								</th>
								<th>
									Tên khách hàng
								</th>
								<th>
									Giới tính
								</th>
								<th>
									Số điện thoại
								</th>
								<th>
									Địa chỉ
								</th>
								<th>
									Tuỳ chọn
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($listCustomerMember as $value)
							<tr>
								<td>
									{{$value->CustomerMemberId}}
								</td>
								<td>
									{{$value->CustomerMemberName}}
								</td>
								<td>
									@if($value->CustomerMemberGender == 1)
										{{"Nam"}}
									@else
										{{"Nữ"}}
									@endif
								</td>
								<td>
									{{$value->CustomerMemberPhoneNumber}}
								</td>
								<td>
									{{$value->CustomerMemberAddress}}
								</td>	
								<td>
									<a href="{{ route('spa_showEditCustomerMember',['id' => $value->CustomerMemberId]) }}" class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only  m-btn--pill" title="Chỉnh sửa">
										<i class="la la-folder"></i>
									</a>
									<a href="#" class="btn btn-info m-btn m-btn--icon btn-sm m-btn--icon-only  m-btn--pill" title="Xoá">
										<i class="la la-folder"></i>
									</a>
								</td>
								@endforeach
							</tr>	
				</tbody>
					</table>
				<!--end: Datatable -->
			</div>
		</div>
	</div>


</div>
</div>

@endsection

@push('scripts')

<script src="assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
@endpush