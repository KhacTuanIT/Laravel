@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}
@section('MenuBar_DashBoard','m-menu__item  m-menu__item--active')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu')
@section('MenuBar_BookingForCustomer','m-menu__item')
{{-- END MENU BAR --}}



@section('titlePage','Bảng điều khiển Spa')
@section('headTitle','Bảng điều khiển')


@section('content')
<div class="row">
	<div class="col-xl-12">
		<div class="m-content">
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
									Phòng
								</th>
								<th>
									Thời gian vào
								</th>
								<th>
									Chi tiết
								</th>
								<th>
									Hành động
								</th>
							</tr>
						</thead>
						<tbody>
							@foreach($customerBooking as $value)
							<tr>
								<td scope="row">
									{{$value->CustomerBookingId}}
								</td>
								<td>
									{{$value->getCustomer->CustomerName}}
								</td>
								<td>
									{{$value->getCustomer->CustomerPhoneNumber}}
								</td>
								<td>
									{{$value->getRoom->RoomName}}
								</td>
								<td>
									{{date("H:i d-m-Y",strtotime($value->CustomerBookingTime))}}
								</td>
								<td>
									<a href="{{route('spa_showDetailCustomer',['id'=> $value->CustomerBookingId])}}" class="btn btn-outline-primary m-btn m-btn--icon">
										<span>
											<i class="la la-archive"></i>
											<span>
												Xem chi tiết
											</span>
										</span>
									</a>
								</td>
								<td data-field="Actions" class="m-datatable__cell">
									<span style="overflow: visible; width: 110px;">						
										<div class="dropdown ">							
											<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
												<i class="la la-ellipsis-h"></i>                            
											</a>						  	
											<div class="dropdown-menu dropdown-menu-right">						    	<a class="dropdown-item" href="#">
												<i class="la la-edit"></i> Chỉnh sửa
												</a>
												<a class="dropdown-item" href="{{ route('spa_showCheckout',['id' => $value->CustomerBookingId]) }}">
													<i class="la la-print"></i> 
													Thanh toán
												</a>						  	
											</div>		

										</div>                     
									</span>
								</td>
							</tr>	
							@endforeach
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