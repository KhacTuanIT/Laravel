@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}
@section('MenuBar_DashBoard','m-menu__item  m-menu__item--active')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu')
@section('MenuBar_BookingForCustomer','m-menu__item')
{{-- END MENU BAR --}}



@section('titlePage','Thanh toán')
@section('headTitle','Thanh toán')


@section('content')
	<div class="m-content">
		<!--Begin::Main Portlet-->
		<div class="row">
			<div class="col-xl-7">
				<!--begin:: Widgets/Best Sellers-->
				<div class="m-portlet m-portlet--full-height ">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									THÔNG TIN THANH TOÁN
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
							</ul>
						</div>
					</div>
					<div class="m-portlet__body">
						<!--begin::Content-->
						<div class="tab-content">
							<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
								<!--begin::m-widget5-->
								<div class="m-widget5">
									<div class="m-widget5__item">
										<div class="m-widget1__item">
											<div class="form-group m-form__group">
												<label>
													Tên khách hàng
												</label>
												<input type="text" value="{{$customer->CustomerName}}" class="form-control m-input" aria-describedby="emailHelp">
											</div>
											<div class="form-group m-form__group">
												<label>
													Số điện thoại
												</label>
												<input type="number" value="{{$customer->CustomerPhoneNumber}}" class="form-control m-input" aria-describedby="emailHelp">
											</div>
											<div class="form-group m-form__group">
												<label>
													Nhân viên phục vụ
												</label>
												<input type="text" value="{{$customer->getStaff->StaffName}}" class="form-control m-input m-input--solid" aria-describedby="emailHelp" readonly>
											</div>
											<div class="form-group m-form__group">
												<label>
													Dịch vụ đã dùng
												</label>
												<input type="text" value="{{$customer->getServices->ServicesName}}" class="form-control m-input m-input--solid" aria-describedby="emailHelp" readonly>
											</div>
											<div class="form-group m-form__group">
												<label>
													Phòng
												</label>
												<input type="text" value="{{$customer->getRoom->RoomName}}" class="form-control m-input m-input--solid" aria-describedby="emailHelp" readonly>
											</div>
										</div>
									</div>
								</div>
								<!--end::m-widget5-->
							</div>
						</div>
						<!--end::Content-->
					</div>
				</div>
				<!--end:: Widgets/Best Sellers-->
			</div>
			<div class="col-xl-5">
				<!--begin:: Widgets/Authors Profit-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									THÔNG TIN GIÁ VÀ DỊCH VỤ
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<div class="m-stack m-stack--ver m-stack--general m-stack--demo" style="height: 20px">
							<div class="m-stack__item  m-stack__item--left" style="background-color: transparent; border: none">
								{{$customer->getServices->ServicesName}}
							</div>

							<div class="m-stack__item m-stack__item--right" style="background-color: transparent; border: none">
								{{number_format($customer->getServices->ServicesPrice,0,",",".")." VNĐ"}}
							</div>
						</div>
					</div>
				</div>
				<!--end:: Widgets/Authors Profit-->
			</div>
		</div>



	</div>

@endsection

@push('scripts')
@endpush