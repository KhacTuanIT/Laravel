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
				<div class="m-portlet m-portlet--bordered-semi m-portlet--full-height ">
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
						<div class="m-widget4">
							<div class="m-widget4__item">
								<div class="m-widget4__img m-widget4__img--logo">
									<img src="assets/app/media/img/client-logos/logo5.png" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__title">
										Trump Themes
									</span>
									<br>
									<span class="m-widget4__sub">
										Make Metronic Great Again
									</span>
								</div>
								<span class="m-widget4__ext">
									<span class="m-widget4__number m--font-brand">
										+$2500
									</span>
								</span>
							</div>
							<div class="m-widget4__item">
								<div class="m-widget4__img m-widget4__img--logo">
									<img src="assets/app/media/img/client-logos/logo4.png" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__title">
										StarBucks
									</span>
									<br>
									<span class="m-widget4__sub">
										Good Coffee & Snacks
									</span>
								</div>
								<span class="m-widget4__ext">
									<span class="m-widget4__number m--font-brand">
										-$290
									</span>
								</span>
							</div>
							<div class="m-widget4__item">
								<div class="m-widget4__img m-widget4__img--logo">
									<img src="assets/app/media/img/client-logos/logo3.png" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__title">
										Phyton
									</span>
									<br>
									<span class="m-widget4__sub">
										A Programming Language
									</span>
								</div>
								<span class="m-widget4__ext">
									<span class="m-widget4__number m--font-brand">
										+$17
									</span>
								</span>
							</div>
							<div class="m-widget4__item">
								<div class="m-widget4__img m-widget4__img--logo">
									<img src="assets/app/media/img/client-logos/logo2.png" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__title">
										GreenMakers
									</span>
									<br>
									<span class="m-widget4__sub">
										Make Green Great Again
									</span>
								</div>
								<span class="m-widget4__ext">
									<span class="m-widget4__number m--font-brand">
										-$2.50
									</span>
								</span>
							</div>
							<div class="m-widget4__item">
								<div class="m-widget4__img m-widget4__img--logo">
									<img src="assets/app/media/img/client-logos/logo1.png" alt="">
								</div>
								<div class="m-widget4__info">
									<span class="m-widget4__title">
										FlyThemes
									</span>
									<br>
									<span class="m-widget4__sub">
										A Let's Fly Fast Again Language
									</span>
								</div>
								<span class="m-widget4__ext">
									<span class="m-widget4__number m--font-brand">
										+$200
									</span>
								</span>
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

	</div>
@endsection