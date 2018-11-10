@extends('admincp.spamanasys.master')

@section('titlePage','Bảng điều khiển Spa')
@section('headTitle','Bảng điều khiển')


@section('content')
	<div class="m-content">
		<!--Begin::Main Portlet-->
		<div class="row">
			<div class="col-xl-12">
				<!--begin:: Widgets/Top Products-->
				<!--begin:: Widgets/Stats-->
				<div class="m-portlet">
					<div class="m-portlet__body  m-portlet__body--no-padding">
						<div class="row m-row--no-padding m-row--col-separator-xl">
							<div class="col-md-12 col-lg-6 col-xl-3">
								<!--begin::Total Profit-->
								<div class="m-widget24">
									<div class="m-widget24__item">
										<h4 class="m-widget24__title">
											Total Frofit
										</h4>
										<br>
										<span class="m-widget24__desc">
											All Customs Value
										</span>
										<span class="m-widget24__stats m--font-brand">
											$17,800
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-brand" role="progressbar" style="width: 78%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="m-widget24__change">
											Change
										</span>
										<span class="m-widget24__number">
											78%
										</span>
									</div>
								</div>
								<!--end::Total Profit-->
							</div>
							<div class="col-md-12 col-lg-6 col-xl-3">
								<!--begin::New Feedbacks-->
								<div class="m-widget24">
									<div class="m-widget24__item">
										<h4 class="m-widget24__title">
											New Feedbacks
										</h4>
										<br>
										<span class="m-widget24__desc">
											Customer Review
										</span>
										<span class="m-widget24__stats m--font-info">
											1349
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-info" role="progressbar" style="width: 84%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="m-widget24__change">
											Change
										</span>
										<span class="m-widget24__number">
											84%
										</span>
									</div>
								</div>
								<!--end::New Feedbacks-->
							</div>
							<div class="col-md-12 col-lg-6 col-xl-3">
								<!--begin::New Orders-->
								<div class="m-widget24">
									<div class="m-widget24__item">
										<h4 class="m-widget24__title">
											New Orders
										</h4>
										<br>
										<span class="m-widget24__desc">
											Fresh Order Amount
										</span>
										<span class="m-widget24__stats m--font-danger">
											567
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-danger" role="progressbar" style="width: 69%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="m-widget24__change">
											Change
										</span>
										<span class="m-widget24__number">
											69%
										</span>
									</div>
								</div>
								<!--end::New Orders-->
							</div>
							<div class="col-md-12 col-lg-6 col-xl-3">
								<!--begin::New Users-->
								<div class="m-widget24">
									<div class="m-widget24__item">
										<h4 class="m-widget24__title">
											New Users
										</h4>
										<br>
										<span class="m-widget24__desc">
											Joined New User
										</span>
										<span class="m-widget24__stats m--font-success">
											276
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-success" role="progressbar" style="width: 90%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="m-widget24__change">
											Change
										</span>
										<span class="m-widget24__number">
											90%
										</span>
									</div>
								</div>
								<!--end::New Users-->
							</div>
						</div>
					</div>
				</div>
				<!--end:: Widgets/Top Products-->
			</div>
		</div>
		<!--End::Main Portlet-->
		<!--Begin::Main Portlet-->
		<div class="row">
			<div class="col-xl-8">
				<!--begin:: Widgets/Best Sellers-->
				<div class="m-portlet m-portlet--full-height ">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									ĐĂNG KÝ PHỤC VỤ CHO KHÁCH HÀNG
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="nav nav-pills nav-pills--brand m-nav-pills--align-right m-nav-pills--btn-pill m-nav-pills--btn-sm" role="tablist">
{{-- 								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_widget5_tab1_content" role="tab">
										Last Month
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab2_content" role="tab">
										last Year
									</a>
								</li>
								<li class="nav-item m-tabs__item">
									<a class="nav-link m-tabs__link" data-toggle="tab" href="#m_widget5_tab3_content" role="tab">
										All time
									</a>
								</li> --}}
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
											<form action="function/customer_dkpv_handle.php" method="post" class="m-form m-form--fit m-form--label-align-right">
												<div class="form-group m-form__group row">
													<label for="example-text-input" class="col-3 col-form-label">
														Tên khách hàng
													</label>
													<div class="col-9">
														<input class="form-control m-input" name="name_customer" type="text" value="" id="example-text-input">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label for="example-text-input" class="col-3 col-form-label">
														SĐT:
													</label>
													<div class="col-9">
														<input class="form-control m-input" name="phone_number" type="text" value="" id="example-text-input">
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-3 col-sm-3">
														Gói dịch vụ
													</label>
													<div class="col-lg-7 col-md-9 col-sm-12">
														<select name="type_service" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
															<option value="1">
																Thường
															</option>
															<option value="2">
																Nâng cao
															</option>
															<option value="3">
																VIP
															</option>
														</select>
													</div>
												</div>
												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-3 col-sm-3">
														Nhân viên tiếp nhận
													</label>
													<div class="col-lg-7 col-md-9 col-sm-12">
														<select name="staff_receive" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
															<option value="">-- Chọn nhân viên --</option>

														</select>
													</div>
												</div>

												<div class="form-group m-form__group row">
													<label class="col-form-label col-lg-3 col-sm-3" style="padding: 0">
														<a class="btn btn-warning" id="btn-select-room"data-toggle="modal" data-target="#listroom">
															Chọn phòng
														</a>
													</label>
													<div class="col-9">
														<input class="form-control m-input" name="room_id" type="hidden" value="" >
														<input class="form-control m-input" name="room_name" type="text" value="" disabled >
													</div>
												</div>
												<center><input type="submit" name="submit" class="btn btn-primary" value="Xác nhận" /></center>
											</form>
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
			<div class="col-xl-4">
				<!--begin:: Widgets/Authors Profit-->
				<div class="m-portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<h3 class="m-portlet__head-text">
									TRẠNG THÁI HIỆN HÀNH SPA
								</h3>
							</div>
						</div>
					</div>
					<div class="m-portlet__body">
						<ul class="nav nav-pills nav-fill" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#tabs_room">
									Phòng
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#tabs_staff">
									Nhân viên
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#m_tabs_5_3">
									Khác
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link disabled" data-toggle="tab" href="#m_tabs_5_4">
									Disabled
								</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tabs_room" role="tabpanel">
								<div class="m-section__content">
									<table class="table table-sm m-table m-table--head-bg-brand ">
										<thead class="thead-inverse">
											<tr>
												<th>
													Tên phòng
												</th>
												<th>
													Loại phòng
												</th>
												<th>
													Chỗ trống/tổng
												</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>
													Jhon
												</td>
												<td>
													Stone
												</td>
												<td>
													@jhon
												</td>
											</tr>
											<tr>
												<td>
													Lisa
												</td>
												<td>
													Nilson
												</td>
												<td>
													@lisa
												</td>
											</tr>
											<tr>
												<td>
													Larry
												</td>
												<td>
													the Bird
												</td>
												<td>
													@twitter
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
							<div class="tab-pane" id="tabs_staff" role="tabpanel">
								<div class="tab-pane active" id="tabs_room" role="tabpanel">
									<div class="m-section__content">
										<table class="table table-sm m-table m-table--head-bg-primary ">
											<thead class="thead-inverse">
												<tr>
													<th>
														Tên nhân viên
													</th>
													<th>
														Trạng thái
													</th>
													<th>
														Phòng làm việc
													</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														Jhon
													</td>
													<td>
														Stone
													</td>
													<td>
														@jhon
													</td>
												</tr>
												<tr>
													<td>
														Lisa
													</td>
													<td>
														Nilson
													</td>
													<td>
														@lisa
													</td>
												</tr>
												<tr>
													<td>
														Larry
													</td>
													<td>
														the Bird
													</td>
													<td>
														@twitter
													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="m_tabs_5_3" role="tabpanel">
							</div>
							<div class="tab-pane" id="m_tabs_5_4" role="tabpanel">
								Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
							</div>
						</div>
					</div>
				</div>
				<!--end:: Widgets/Authors Profit-->
			</div>
		</div>
		{{-- modal --}}
		<div class="modal fade" id="listroom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">
							XEM DANH SÁCH PHÒNG
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">
								&times;
							</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table m-table m-table--head-bg-primary table-responsive">
							<thead>
								<tr>
									<th>Tên phòng</th>
									<th>Loại phòng</th>
									<th>Sức chứa</th>
									<th>Chỗ trống</th>
									<th>Chọn Phòng</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Phòng demo 1</td>
									<td>Vip 1</td>
									<td>10</td>
									<td>10</td>
									<td class="btn-choose">
										<button
											id=""
											style="width: 108px"
											type="button"
											class="btn btn-warning"
											target-name="
											target-typeroom=""
											data-id_room="">
											Chọn phòng
										</button>
									</td>								
								</tr>
							</tbody>
							</table>
						</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">
							Close
						</button>
						<button type="button" class="btn btn-primary">
							Send message
						</button>
					</div>
				</div>
			</div>
		</div>

		<!--End::Main Portlet-->

		<!--Begin::Main Portlet Calender-->
		{{-- <div class="row">
			<div class="col-xl-12">
				<!--begin::Portlet-->
				<div class="m-portlet" id="m_portlet">
					<div class="m-portlet__head">
						<div class="m-portlet__head-caption">
							<div class="m-portlet__head-title">
								<span class="m-portlet__head-icon">
									<i class="flaticon-map-location"></i>
								</span>
								<h3 class="m-portlet__head-text">
									Calendar
								</h3>
							</div>
						</div>
						<div class="m-portlet__head-tools">
							<ul class="m-portlet__nav">
								<li class="m-portlet__nav-item">
									<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--pill m-btn--air">
										<span>
											<i class="la la-plus"></i>
											<span>
												Add Event
											</span>
										</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<div class="m-portlet__body">
						<div id="m_calendar"></div>
					</div>
				</div>
				<!--end::Portlet-->
			</div>
		</div> --}}
		<!--End::Main Portlet-->
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							DANH SÁCH KHÁCH HÀNG ĐANG ĐƯỢC PHỤC VỤ
						</h3>
					</div>
				</div>
				<div class="m-portlet__head-tools">
					<ul class="m-portlet__nav">
						<li class="m-portlet__nav-item">
							<div class="m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" data-dropdown-toggle="hover" aria-expanded="true">
								<a href="#" class="m-portlet__nav-link btn btn-lg btn-secondary  m-btn m-btn--icon m-btn--icon-only m-btn--pill  m-dropdown__toggle">
									<i class="la la-ellipsis-h m--font-brand"></i>
								</a>
								<div class="m-dropdown__wrapper">
									<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
									<div class="m-dropdown__inner">
										<div class="m-dropdown__body">
											<div class="m-dropdown__content">
												<ul class="m-nav">
													<li class="m-nav__section m-nav__section--first">
														<span class="m-nav__section-text">
															Quick Actions
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-share"></i>
															<span class="m-nav__link-text">
																Create Post
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-chat-1"></i>
															<span class="m-nav__link-text">
																Send Messages
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-multimedia-2"></i>
															<span class="m-nav__link-text">
																Upload File
															</span>
														</a>
													</li>
													<li class="m-nav__section">
														<span class="m-nav__section-text">
															Useful Links
														</span>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-info"></i>
															<span class="m-nav__link-text">
																FAQ
															</span>
														</a>
													</li>
													<li class="m-nav__item">
														<a href="" class="m-nav__link">
															<i class="m-nav__link-icon flaticon-lifebuoy"></i>
															<span class="m-nav__link-text">
																Support
															</span>
														</a>
													</li>
													<li class="m-nav__separator m-nav__separator--fit m--hide"></li>
													<li class="m-nav__item m--hide">
														<a href="#" class="btn btn-outline-danger m-btn m-btn--pill m-btn--wide btn-sm">
															Submit
														</a>
													</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<!--begin: Search Form -->
				<div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
					<div class="row align-items-center">
						<div class="col-xl-8 order-2 order-xl-1">
							<div class="form-group m-form__group row align-items-center">
								<div class="col-md-4">
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
							<a href="#" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
								<span>
									<i class="la la-cart-plus"></i>
									<span>
										New Order
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
							<th>
								Mã KH
							</th>
							<th>
								Tên khách hàng
							</th>
							<th>
								Số điện thoại
							</th>
							<th>
								Dịch vụ
							</th>
							<th>
								Nhân viên Phục vụ
							</th>
							<th>
								Phòng
							</th>
							<th>
								Thời gian vào
							</th>
							<th>
								Hành động
							</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td scope="row">
								16590-107
							</td>
							<td>
								Zandra Fisbburne
							</td>
							<td>
								(916) 6137523
							</td>
							<td>
								Pontiac
							</td>
							<td>
								Grand Am
							</td>
							<td>
								Puce
							</td>
							<td>
								<span style="width: 110px;"><span class="m-badge m-badge--success m-badge--wide">
								Info</span></span>
							</td>
							<td>
								2016-09-08
							</td>
						</tr>
						<tr>
							<td scope="row">
								58232-0517
							</td>
							<td>
								Mela Ord
							</td>
							<td>
								(331) 6613809
							</td>
							<td>
								Lamborghini
							</td>
							<td>
								Gallardo
							</td>
							<td>
								Aquamarine
							</td>
							<td>
								$46031.10
							</td>
							<td>
								2016-08-21
							</td>
						</tr>
					</tbody>
				</table>
				<!--end: Datatable -->
			</div>
		</div>
	</div>

@endsection

@section('script')
<script src="assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>

@endsection