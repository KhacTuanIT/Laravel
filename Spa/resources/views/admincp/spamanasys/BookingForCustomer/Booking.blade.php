@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}

@section('MenuBar_DashBoard','m-menu__item')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded')
@section('MenuBar_BookingForCustomer','m-menu__item m-menu__item--active')
@section('MenuBar_ListCustomerBooking','m-menu__item')
@section('MenuBar_Search','m-menu__item')
@section('MenuBar_TitleCustomerMember','m-menu__item m-menu__item--submenu')
@section('MenuBar_AddCustomerMember','m-menu__item')
@section('MenuBar_ListCustomerMember','m-menu__item')
@section('MenuBar_TitleStaffManagement','m-menu__item m-menu__item--submenu ')
@section('MenuBar_AddStaff','m-menu__item')
@section('MenuBar_ListStaff','m-menu__item')

{{-- END MENU BAR --}}

@section('titlePage','Đăng ký dịch vụ cho khách hàng')
@section('headTitle','Đăng ký dịch vụ cho khách hàng')

@section('content')
<div class="m-content">
	<!--Begin::Main Portlet-->
	<div class="row">
		<div class="col-xl-7">
		@include('admincp.spamanasys.notifications.notifications')
			{{-- <div class="alert alert-success"">
				<ul>
					 <li></li>
				</ul>
			</div>  --}}
			<!--begin:: Widgets/Best Sellers-->
			<div class="m-portlet m-portlet--full-height " >
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								ĐĂNG KÝ DỊCH VỤ CHO KHÁCH HÀNG
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<ul class="nav nav-pills nav-fill" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">
								Khách vãng lai
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">
								Khách hàng thành viên
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
							<form action="{{route('spa_BookingCustomer')}}" method="POST" class="m-form m-form--fit m-form--label-align-right">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Tên khách hàng
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<input class="form-control m-input" name="CustomerName" type="text" value="{{old('CustomerName')}}" required>
										@if($errors->has('CustomerName'))
										<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
											{{$errors->first('CustomerName')}}

										</span>
										@endif
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										SĐT:
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<input class="form-control m-input" name="CustomerPhoneNumber" type="text" value="{{old('CustomerPhoneNumber')}}" required>
										@if($errors->has('CustomerPhoneNumber'))
										<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
											{{$errors->first('CustomerPhoneNumber')}}
										</span>
										@endif
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Giới tính:
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<div class="m-radio-inline">
											<label class="m-radio m-radio--bold m-radio--state-info">
												<input type="radio" name="gender" value="1" checked>
												Nam
												<span></span>
											</label>
											<label class="m-radio m-radio--bold m-radio--state-danger">
												<input type="radio" name="gender" value="0">
												Nữ
												<span></span>
											</label>
										</div>
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Nhân viên tiếp nhận
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<select name="StaffId" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
											@foreach($staff as $value)
											<option value="{{$value->StaffId}}" {{ old('StaffId') == $value->StaffId ? "selected" : "" }}>{{$value->StaffName}}</option>
											@endforeach()
										</select>
										@if($errors->has('StaffId'))
										<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
											{{$errors->first('StaffId')}}
										</span>
										@endif
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Gói dịch vụ
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
											Danh sách dịch vụ
										</button>
										<div class="collapse" id="collapseExample">
											<div class="card card-body">
												<div class="m-checkbox-list">
													@foreach($services as $value)
													<label class="m-checkbox list-services">
														<input type="checkbox" name="ServicesId[]" id="ServicesCustomer" value="{{$value->ServicesId}}" 
														@if(is_array(old('ServicesId')) && in_array($value->ServicesId, old('ServicesId'))) checked @endif
														>
														{{$value->ServicesName." [".number_format($value->ServicesPrice,0,",",".")." ₫]"}}
														<span></span>
													</label>
													@endforeach
												</div>
											</div>
										</div>
									</div>
								</div>	
								<div class="form-group m-form__group row">
									<label class="col-lg-3 col-sm-3" style="padding: 0">
										<a class="btn btn-warning" id="btn-select-room" data-toggle="modal" data-target="#listroom">
											Chọn phòng
										</a>
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<input class="form-control m-input" name="RoomId" value="{{old('RoomId')}}" type="hidden">
										<input class="form-control m-input m-input--solid" name="room_name" value="{{old('room_name')}}" type="text" readonly>
										@if($errors->has('RoomId'))
										<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
											{{$errors->first('RoomId')}}
										</span>
										@endif
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Tổng cộng
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<input style="color: red;font-weight: bold" class="form-control m-input" id="PriceCustomer" readonly />
									</div>
								</div>
								<center><button type="submit" class="btn btn-primary"/>Đăng ký dịch vụ</button></center>
							</form>
						</div>
						<div class="tab-pane" id="m_tabs_5_2" role="tabpanel"><form action="{{route('spa_BookingCustomerMember')}}" method="POST" class="m-form m-form--fit m-form--label-align-right">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group m-form__group row">
								<label class="col-form-label col-lg-3 col-sm-3">
									Tìm kiếm
								</label>
								<div class="col-lg-7 col-md-9 col-sm-12">
									<input class="form-control m-input" name="CustomerPhoneSearch" type="text" placeholder="Nhập SĐT để tìm kiếm" required>
									<span class="m-form__help errors-customerphonesearch" style="color: red;font-weight: bold;display: none">
									</span>
									<span class="m-form__help success-customerphonesearch" style="color: green;font-weight: bold;display: none">
									</span>
									<br>
									<button class="btn btn-default" type="button" id="searchCustomerMember">
										Tìm kiếm
									</button>
									<button class="btn btn-default" type="reset" id="cancelSearchCustomerMember">
										Huỷ
									</button>
								</div>
							</div>
							<div id="InfoCustomer" style="display: none">
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Tên khách hàng
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<input type="hidden" id="IdCustomerMember" name="CustomerMemberId" value="">
										<input class="form-control m-input" id="CustomerName" name="CustomerName" type="text" disabled>
										@if($errors->has('CustomerName'))
										<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
											{{$errors->first('CustomerName')}}
										</span>
										@endif
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										SĐT:
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<input class="form-control m-input" id="CustomerPhoneNumber" name="CustomerPhoneNumber" type="text"  disabled>
										@if($errors->has('CustomerPhoneNumber'))
										<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
											{{$errors->first('CustomerPhoneNumber')}}
										</span>
										@endif
									</div>
								</div>
								<div class="form-group m-form__group row">
									<label class="col-form-label col-lg-3 col-sm-3">
										Giới tính:
									</label>
									<div class="col-lg-7 col-md-9 col-sm-12">
										<div class="m-radio-inline">
											<label id="labelRadioGender" class="">
												<input type="radio" id="radioGender" name="gender" value="1" checked>
												<p id="TextGender"></p>
												<span></span>
											</label>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-form-label col-lg-3 col-sm-3">
									Nhân viên tiếp nhận
								</label>
								<div class="col-lg-7 col-md-9 col-sm-12">
									<select name="StaffId2" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
										@foreach($staff as $value)
										<option value="{{$value->StaffId}}" {{ old('StaffId2') == $value->StaffId ? "selected" : "" }}>{{$value->StaffName}}</option>
										@endforeach()
									</select>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-form-label col-lg-3 col-sm-3">
									Gói dịch vụ
								</label>
								<div class="col-lg-7 col-md-9 col-sm-12">
									<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample2" aria-expanded="false" aria-controls="collapseExample">
										Danh sách dịch vụ
									</button>
									<div class="collapse" id="collapseExample2">
										<div class="card card-body">
											<div class="m-checkbox-list">
												@foreach($services as $value)
												<label class="m-checkbox list-services2">
													<input type="checkbox" name="ServicesId2[]" value="{{$value->ServicesId}}" 
													@if(is_array(old('ServicesId2')) && in_array($value->ServicesId, old('ServicesId2'))) checked @endif
													>
													{{$value->ServicesName." [".number_format($value->ServicesPrice,0,",",".")." ₫]"}}
													<span></span>
												</label>
												@endforeach
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="form-group m-form__group row">
								<label class="col-lg-3 col-sm-3" style="padding: 0">
									<a class="btn btn-warning" id="btn-select-room" data-toggle="modal" data-target="#listroom">
										Chọn phòng
									</a>
								</label>
								<div class="col-lg-7 col-md-9 col-sm-12">
									<input class="form-control m-input" name="RoomId" value="{{old('RoomId')}}" type="hidden">
									<input class="form-control m-input m-input--solid" name="room_name" value="{{old('room_name')}}" type="text" readonly>
									@if($errors->has('RoomId'))
									<span class="m-form__help errors-customername" style="color: red;font-weight: bold">
										{{$errors->first('RoomId')}}
									</span>
									@endif
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-form-label col-lg-3 col-sm-3">
									Tổng cộng
								</label>
								<div class="col-lg-7 col-md-9 col-sm-12">
									<input style="color: red;font-weight: bold" class="form-control m-input" id="PriceCustomerMember" readonly />
								</div>
							</div>
							<center><button type="submit" class="btn btn-primary"/>Đăng ký dịch vụ</button></center>
						</form>
					</div>
				</div>
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
							Tìm kiếm khách hàng thành viên
						</h3>
					</div>
				</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-section__content">
						<form>
							<div class="form-group m-form__group row">
								<label class="col-form-label col-lg-3 col-sm-3">
									Tìm kiếm
								</label>
								<div class="col-lg-9 col-md-12 col-sm-12">
									<input class="form-control m-input" id="tableCustomerPhoneSearch" name="tableCustomerPhoneSearch" type="text" placeholder="Nhập SĐT để tìm kiếm" required>
									<span class="m-form__help errors-tablecustomerphonesearch" style="color: red;font-weight: bold;display: none">
									</span>
									<span class="m-form__help success-tablecustomerphonesearch" style="color: green;font-weight: bold;display: none">
									</span>
									<br>
									<button class="btn m-btn m-btn--gradient-from-success m-btn--gradient-to-accent" type="button" id="FrmsearchCustomerMember">
										Tìm kiếm
									</button>
									<button class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning" type="button" id="btnModalHistoryMemberFake" >
										Xem Chi tiết
									</button>
									<button class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning" type="button" id="btnModalHistoryMember" data-toggle="modal" data-target="#ModalHistoryMember" style="display: none">
										Xem Chi tiết
									</button>
									<button class="btn m-btn m-btn--gradient-from-info m-btn--gradient-to-accent" type="button" id="FrmcancelSearchCustomerMember">
										Huỷ
									</button>
								</div>
							</div>
							<div class="form-group m-form__group row">
								<label class="col-form-label col-lg-3 col-sm-3">
								</label>
								<div class="col-lg-9 col-md-12 col-sm-12">
									<span class="m-form__help success-searchFrmCusMem" style="color: green;font-weight: bold;display: none">
									</span>
									<span class="m-form__help errors-searchFrmCusMem" style="color: red;font-weight: bold;display: none">
									</span>
								</div>
							</div>
							<table class="table m-table m-table--head-no-border tbl-search-memcustomerinfo" style="display: none">
								<thead class="">
									<tr>
										<th>Họ Tên</th>
										<th>Số điện thoại</th>
										<th>Giới tính</th>
									</tr>
								</thead>
								<tbody class="content-searchInfoCusMem">

								</tbody>
							</table>
							<table class="table m-table m-table--head-bg-brand tbl-search-memcustomer" style="display: none">
								<thead class="thead-inverse">
									<tr>
										<th>Thời gian</th>
										<th>Dịch vụ</th>
									</tr>
								</thead>
								<tbody class="content-searchServicesMemUsed">

								</tbody>
							</table>
						</form>
					</div>
				</div>
			</div>
			<!--end:: Widgets/Authors Profit-->
		</div>
	</div>
	{{-- MODAL --}}
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
					<ul class="nav nav-pills nav-fill" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#roomAvailable" aria-expanded="true">
								Các phòng còn trống
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#allRoom" aria-expanded="false">
								Tất cả các phòng
							</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="roomAvailable" role="tabpanel" aria-expanded="true">
							<table class="table m-table table-sm m-table--head-bg-primary table-responsive">
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
									@foreach($roomAvailable as $key => $value)
									<tr>
										<td>{{$value->RoomName}}</td>
										<td>{{$value->getRoomType->RoomTypeName}}</td>
										<td>{{$value->getRoomType->RoomTypeCapacity}}</td>
										<td class="room-blank">
											@if($value->RoomBlank == 0)
											{!!$value->RoomBlank = "<span style='color:red;font-weight:bold'>Đã hết chỗ trống</span>" !!} 
											@else
											{{$value->RoomBlank}}
											@endif
										</td>
										<td class="btn-choose">
											<button
											id="{{$value->RoomId}}"
											style="width: 108px"
											type="button"
											class="btn btn-warning"
											target-name="{{$value->RoomName}}"
											target-roomblank="{{$value->RoomBlank}}"
											target-typeroom="{{$value->getRoomType->RoomTypeName}}"
											data-id_room="{{$value->RoomId}}">
											Chọn phòng
										</button>
									</td>								
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
					<div class="tab-pane" id="allRoom" role="tabpanel" aria-expanded="false">
						<table class="table m-table table-sm m-table--head-bg-primary table-responsive">
							<thead>
								<tr>
									<th>Tên phòng</th>
									<th>Loại phòng</th>
									<th>Sức chứa</th>
									<th>Chỗ trống</th>
								</tr>
							</thead>
							<tbody>
								@foreach($allRoom as $key => $value)
								<tr>
									<td>{{$value->RoomName}}</td>
									<td>{{$value->getRoomType->RoomTypeName}}</td>
									<td>{{$value->getRoomType->RoomTypeCapacity}}</td>
									<td class="room-blank">
										@if($value->RoomBlank == 0)
										{!!$value->RoomBlank = "<span style='color:red;font-weight:bold'>Đã hết chỗ trống</span>" !!} 
										@else
										{{$value->RoomBlank}}
										@endif
									</td>								
								</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">
					Xác nhận
				</button>
			</div>
		</div>
	</div>
</div>
	{{-- END MODAL --}}

	{{-- MODAL History Member  --}}
	<div class="modal fade" id="ModalHistoryMember" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">
						LỊCH SỬ SỬ DỤNG CỦA KHÁCH HÀNG THÀNH VIÊN
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">
							&times;
						</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Họ và tên: <span id="frmModalFullName" style="font-weight: bold"></span></p>
					<p>Số điện thoại: <span id="frmModalPhonenumber" style="font-weight: bold"></span></p>
					<p>Giới tính: <span id="frmModalGender" style="font-weight: bold"></span></p>
{{-- 					<p>Địa chỉ: <span id="frmModalAddress" style="font-weight: bold"></span></p>
 --}}					<!--begin: Datatable -->
						<div id="json_data">
							<div class="m_datatable">
							</div>
						</div>
					<!--end: Datatable -->
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">
						Xác nhận
					</button>
				</div>
			</div>
		</div>
	</div>
	{{-- END MODAL --}}
<!--End::Main Portlet-->

<!--Begin::Main Portlet Calender-->
</div>

@endsection

@push('scripts')
	<script type="text/javascript">
		/*
			Opensource Functions


		*/
		function number_format( number, decimals, dec_point, thousands_sep ) {
	    // * example 1: number_format(1234.5678, 2, '.', '');
	    // * returns 1: 1234.57
	    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
	    var d = dec_point == undefined ? "," : dec_point;
	    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
	    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;

	    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
	}

	$(document).ready(function() {
		var count = 0;

		$('.btn-choose').children().on('click',function(){
			count++;
			console.log(count + " lan");
			if(count > 1) {
				var cr = $('.btn-choose').children().attr("class");
				if(cr == "btn btn-success activate") {
					$('.btn-choose').children().removeClass("btn-success activate");
					$('.btn-choose').children().addClass("btn-warning").text("Chọn phòng");
				} else {
					$('.btn-choose').children().removeClass("btn-success activate");
					$('.btn-choose').children().addClass("btn-warning").text("Chọn phòng");
				}
			}
			var room_id = $(this).attr("id");
			if($("#"+room_id).on('click')){
				if($("#id").attr("class") == "btn-success activate"){
					$("#"+room_id).removeClass("btn-success activate").addClass("btn-warning").text("Chọn phòng");
					console.log("Found btn-activate");
				}
				else{
					console.log("add activate");
					$("#"+room_id).removeClass("btn-warning").addClass("btn-success activate").text("Đã chọn ✔");
				}
			}
			var room_name = $(this).attr("target-name");
			var typeroom = $(this).attr("target-typeroom");
			// alert(room_name +" có ID: "+room_id);
					$('input[name="RoomId"]').val(room_id);
					$('input[name="room_name"]').val(room_name+" ["+typeroom+"]");
			// alert(test);
		});
	});
	
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
	});
	
	$(document).ready(function(){
		$("#searchCustomerMember").click(function(){
			$.ajax({
				url: '{{ route('spa_searchCusMemBook') }}',
				type: 'GET',
				dataType: 'JSON',
				data:{
					CustomerPhoneSearch: $('input[name="CustomerPhoneSearch"]').val(),  
				},
				success: function(data){
					console.log(data);
					$('.errors-customerphonesearch').hide();
					$('.success-customerphonesearch').show();
					$('#InfoCustomer').show();
					$('.success-customerphonesearch').text(data.message);
					$('#IdCustomerMember').val(data.CustomerMemberId);
					$('#CustomerName').val(data.CustomerMemberName);
					$('#CustomerPhoneNumber').val(data.CustomerMemberPhoneNumber);
					if(data.CustomerMemberGender == 1){
						$("#TextGender").text("Nam");
						$("#labelRadioGender").addClass("m-radio m-radio--bold m-radio--state-info");
						$("#radioGender").val(1);
						// $("#radioGender").prop("checked", true);
					}
					if(data.CustomerMemberGender == 0){
						$("#TextGender").text("Nữ");
						$("#labelRadioGender").addClass("m-radio m-radio--bold m-radio--state-danger");
						$("#radioGender").val(0);
						// $("#radioGender").prop("checked", true);
					}
				},
				error: function(data){
					console.log(data);
					$('.success-customerphonesearch').hide();
					$('#InfoCustomer').hide();
					$('.errors-customerphonesearch').show();
					$('.errors-customerphonesearch').text(data.responseJSON.CustomerPhoneSearch);
					$('#CustomerName').val("");
					$('#CustomerPhoneNumber').val("");
				}
			});
		});
		$("#cancelSearchCustomerMember").click(function(){
			$('.errors-customerphonesearch').hide();
			$('.success-customerphonesearch').hide();
			$('#InfoCustomer').hide();
		});

		$("#FrmsearchCustomerMember").click(function(){
			if($("#tableCustomerPhoneSearch").val() == ""){
				$(".success-searchFrmCusMem").hide();
				$(".errors-searchFrmCusMem").text("Vui lòng nhập số điện thoại").show();
				$(".errors-searchFrmCusMem").fadeOut(7000);
			}else{
				$.ajax({
					url: '{{ route('spa_searchTableCusMemBook') }}',
					type: 'GET',
					dataType: 'JSON',
					data:{
						CustomerPhoneNumberTable :  $("#tableCustomerPhoneSearch").val(),
					},
					success: function(data){
						console.log(data);
						$(".errors-searchFrmCusMem").hide();
						$(".success-searchFrmCusMem").text("Tìm kiếm thành công 10 kết quả gần nhất").show();
						$(".tbl-search-memcustomerinfo").show();
						$(".tbl-search-memcustomer").show();
						if(data.customerMember.CustomerMemberGender == 1){
							data.customerMember.CustomerMemberGender = "Nam";
						}
						if(data.customerMember.CustomerMemberGender == 0){
							data.customerMember.CustomerMemberGender = "Nữ";
						}
						var tableInfo = '';
							tableInfo += '<tr>'+
							'<td>' + data.customerMember.CustomerMemberName + '</td>' +
							'<td>' + data.customerMember.CustomerMemberPhoneNumber + '</td>' +
							'<td>' + data.customerMember.CustomerMemberGender + '</td>'
							'</tr>';
						$(".content-searchInfoCusMem").html(tableInfo);

						var tableServices = '';
						console.log(data.historyMemberDetail);
						console.log(data.historyMemberDetail.ServicesId);

						if(data.historyMemberDetail.length == 0 ){
							tableServices += '<tr>'+
							'<td>' + "Không có dữ liệu" + '</td>' +
							'<td>' + ""+ '</td>' + 
							'</tr>';
						}
						else{
							for(var i = 0; i < data.historyMemberDetail.length; i++){
								for(var j = 0; j < data.historyMember.length; j++){
									if(data.historyMember[j].HistoryMemberId == data.historyMemberDetail[i].HistoryMemberId){
										data.historyMemberDetail[i].HistoryMemberId = data.historyMember[j].BookingTime;
									}
								}
								tableServices += '<tr>'+
								'<td>' + data.historyMemberDetail[i].HistoryMemberId + '</td>' +
								'<td>' + data.historyMemberDetail[i].ServicesId + '</td>' + 
								'</tr>';
								
							}
						}

						$(".content-searchServicesMemUsed").html(tableServices);
	                },

	                error : function(data){
	                	$(".success-searchFrmCusMem").hide();
	                	$(".errors-searchFrmCusMem").text("Tìm kiếm không thành công").show();
	                }

						// data.CustomerId
					// },
					// error: function(data){
					// 	console.log(data);
					// }
				});
			}
		});



		$("#FrmcancelSearchCustomerMember").on("click",function(){
			$("#tableCustomerPhoneSearch").val("");
			$(".success-searchFrmCusMem").hide();
			$(".errors-searchFrmCusMem").hide();
			$(".tbl-search-memcustomerinfo").hide();
			$(".tbl-search-memcustomer").hide();
		});

		$('.list-services').children().on("change", function(){
			var ServicesId = $(this).attr("value");
			// alert(ServicesId);
			if(this.checked) {
				$.ajax({
					url: '{{ route('spams_ajaxPriceServices') }}',
					type: 'GET',
					dataType: 'JSON',
					data:{
						idServices :  ServicesId,
					},
					success: function(data){
						console.log(data);
						// var total = 00
						var temp = $("#PriceCustomer").val();
						if(temp == ""){
							temp = 0 + " đ";
						}
						temp = temp.replace("₫", "");
						console.log("Bỏ đ: " + temp);

						temp = temp.split('.').join("");;  
						console.log("Bỏ dấu . : " + temp);
						// temp = temp.replace(/\s/g,'');
						temp = parseFloat(temp);
						console.log(temp);
						var price = data.ServicesPrice;
						total = price + temp;
						$("#PriceCustomer").val((total).toLocaleString('vi-VN', {
							style: 'currency',
							currency: 'VND',
						}));
					},
					error : function(data){

					}
				});	
    		}
    		else{
    			$.ajax({
    				url: '{{ route('spams_ajaxPriceServices') }}',
    				type: 'GET',
    				dataType: 'JSON',
    				data:{
    					idServices :  ServicesId,
    				},
    				success: function(data){
						var priceStock = $("#PriceCustomer").val();
						priceStock = priceStock.replace("₫", "");
						priceStock = priceStock.split('.').join("");;  
						priceStock = parseFloat(priceStock);
						var priceMustMinus = data.ServicesPrice;
						PriceAfterMinus = priceStock - priceMustMinus;
						$("#PriceCustomer").val((PriceAfterMinus).toLocaleString('vi-VN', {
							style: 'currency',
							currency: 'VND',
						}));
					},
					error : function(data){

					}
				});	
    		}
		});		
		$('.list-services2').children().on("change", function(){
			var ServicesId = $(this).attr("value");
			// alert(ServicesId);
			if(this.checked) {
				$.ajax({
					url: '{{ route('spams_ajaxPriceServices') }}',
					type: 'GET',
					dataType: 'JSON',
					data:{
						idServices :  ServicesId,
					},
					success: function(data){
						console.log(data);
						// var total = 00
						var temp = $("#PriceCustomerMember").val();
						if(temp == ""){
							temp = 0 + " đ";
						}
						temp = temp.replace("₫", "");
						console.log("Bỏ đ: " + temp);

						temp = temp.split('.').join("");;  
						console.log("Bỏ dấu . : " + temp);
						// temp = temp.replace(/\s/g,'');
						temp = parseFloat(temp);
						console.log(temp);
						var price = data.ServicesPrice;
						total = price + temp;
						$("#PriceCustomerMember").val((total).toLocaleString('vi-VN', {
							style: 'currency',
							currency: 'VND',
						}));
					},
					error : function(data){

					}
				});	
    		}
    		else{
    			$.ajax({
    				url: '{{ route('spams_ajaxPriceServices') }}',
    				type: 'GET',
    				dataType: 'JSON',
    				data:{
    					idServices :  ServicesId,
    				},
    				success: function(data){
						var priceStock = $("#PriceCustomerMember").val();
						priceStock = priceStock.replace("₫", "");
						priceStock = priceStock.split('.').join("");;  
						priceStock = parseFloat(priceStock);
						var priceMustMinus = data.ServicesPrice;
						PriceAfterMinus = priceStock - priceMustMinus;
						$("#PriceCustomerMember").val((PriceAfterMinus).toLocaleString('vi-VN', {
							style: 'currency',
							currency: 'VND',
						}));
					},
					error : function(data){

					}
				});	
    		}
		});



		// if($('#ServicesCustomer').is(':checked') == true){
		// 	alert("click roi");
		// }







	});


	// $(document).ready(function(){
	// 	$("#submit").click(function(e){
	// 		var CustomerName = $('#CustomerName').val(); 
	// 		var CustomerPhoneNumber = $('#CustomerPhoneNumber').val();
	// 		var ServicesId = 0;
	// 		var StaffId = 0;
	// 		var RoomId = $('#RoomId').val();
	// 		ServicesId = $( "#ServicesId option:selected" ).val();
	// 		StaffId = $( "#StaffId option:selected" ).val();

	// 		$.ajax({
	// 			url: '{{-- route('spa_Booking') --}}',
	// 			type: 'POST',
	// 			dataType: 'JSON',
	// 			data:{
	// 				CustomerName : CustomerName,
	// 				CustomerPhoneNumber: CustomerPhoneNumber,
	// 				ServicesId: ServicesId,
	// 				StaffId: StaffId,
	// 				RoomId: RoomId,
	// 			},
	// 			success: function(data){
	// 				console.log(data);
	// 				$('.alert-danger').hide();
	// 				$('.alert-success').show();
	// 				$(".success-message").html(data.success);
	// 				$("#formReg")[0].reset();

	// 				// $('#CustomerName').val("");
	// 				// $('#CustomerPhoneNumber').val("");
	// 				// $('#RoomId').val("");
	// 				// $('input[name="room_name"]').val("");
	// 				// $("#ServicesId").val("").selectpicker("refresh");
	// 				// $("#StaffId").val("").selectpicker("refresh");
	// 				// $('.btn-choose').children().removeClass("btn-success activate");
	// 				// $('.btn-choose').children().addClass("btn-warning").text("Chọn phòng");
	// 				$('.alert-success').delay(7000).fadeOut('slow');
	// 			},
	// 			error: function(data){
	// 				console.log(data);
	// 				$('.alert-success').hide();
	// 				var errors = $.parseJSON(data.responseText);
	// 				// $('.errors-customername').text("");
	// 				// $('.errors-customerphonenumber').text("");
	// 				// $('.errors-servicesid').text("");
	// 				// $('.errors-staffid').text("");
	// 				// $('.errors-roomid').text("");
					
	// 				// $('.alert-danger').show();
	// 				$('.errors-customername').text(errors['CustomerName']);
	// 				$('.errors-customerphonenumber').text(errors['CustomerPhoneNumber']);
	// 				$('.errors-servicesid').text(errors['ServicesId']);
	// 				$('.errors-staffid').text(errors['StaffId']);
	// 				$('.errors-roomid').text(errors['RoomId']);
	// 				$('#CustomerName').keyup(function() {
	// 					$(this).parent().children('span').text('');
	// 				});
	// 				$('#CustomerPhoneNumber').keyup(function() {
	// 					$(this).parent().children('span').text('');
	// 				});
	// 				$('#ServicesId').change(function() {
	// 					$('.errors-servicesid').text("");
	// 				});
	// 				$('#StaffId').change(function() {
	// 					$('.errors-staffid').text("");
	// 				});

	// 				$('#btn-select-room').click(function() {
	// 					$('.errors-roomid').text("");
	// 				});
	// 			}
	// 		});
	// 	});
	// });

</script>
<script src="assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
{{-- <script src="assets/demo/default/custom/components/datatables/base/data-jsonHistoryMemberDemo.js" type="text/javascript"></script> --}}
<script type="text/javascript">
	function loadJsonTable(){
		$.ajax({
			url: '{{ route('spa_searchTableCusMemBook') }}',
			type: 'GET',
			dataType: 'JSON',
			data:{
				CustomerPhoneNumberTable :  $("#tableCustomerPhoneSearch").val(),
			},
			success: function(data){
				console.log(data);
				if(data.customerMember.CustomerMemberGender == 1){
					data.customerMember.CustomerMemberGender = "Nam";
				}
				if(data.customerMember.CustomerMemberGender == 0){
					data.customerMember.CustomerMemberGender = "Nữ";
				}
				$('#frmModalFullName').text(data.customerMember.CustomerMemberName);
				$('#frmModalPhonenumber').text(data.customerMember.CustomerMemberPhoneNumber);
				$('#frmModalGender').text(data.customerMember.CustomerMemberGender);
				$('#frmModalAddress').text();
			},
			error : function(data){	
			}
		});





		var DatatableJsonRemoteDemo = function() {
			var t = function() {
				var phonenumber = $("#tableCustomerPhoneSearch").val();
				var t = $(".m_datatable").mDatatable({
					data: {
						type: "remote",
                    // source: "./api/datatable/data-json/historyMemberDemo.json",
                    source: {
                    	read: {
                    		method: "GET",
                    		url: "{{ route('jsonShowInfoCusMember',[ 'id' =>''])}}/"+phonenumber,
                    	}
                    },
                    pageSize: 10,
                    saveState: {
                    	cookie: !0,
                    	webstorage: !0
                    }
                },
                layout: {
                	theme: "default",
                	class: "",
                	scroll: !1,
                	height: 550,
                	footer: !1
                },
                sortable: !0,
                pagination: !0,
                search: {
                	input: $("#generalSearch"),
                },
                columns: [{
                	field: "CustomerMemberId",
                	title: "Mã KH",
                	width: 50,
                }, {
                	field: "HistoryMemberId",
                	title: "Thời gian",
                	width: 200,
                	textAlign: "center",
                }, {
                	field: "ServicesId",
                	title: "Dịch vụ đã dùng",
                	width: 200,
                	textAlign: "center",

                },]
            }),
				e = t.getDataSourceQuery();
				// $("#m_form_status").on("change", function() {
				// 	t.search($(this).val(), "Status")
				// }).val(void 0 !== e.Status ? e.Status : ""), $("#m_form_type").on("change", function() {
				// 	t.search($(this).val(), "Type")
				// }).val(void 0 !== e.Type ? e.Type : ""), $("#m_form_status, #m_form_type").selectpicker()
			};
			return {
				init: function() {
					t()
				}
			}
		}();
		$(document).ready(function() {
			DatatableJsonRemoteDemo.init()
		});
	}

	$(document).ready(function(){
		$("#btnModalHistoryMemberFake").on("click",function(){
			if($("#tableCustomerPhoneSearch").val() == ""){
				$(".success-searchFrmCusMem").hide();
				$(".errors-searchFrmCusMem").text("Vui lòng nhập số điện thoại").show();
				$(".errors-searchFrmCusMem").fadeOut(7000);
			}
			else{
				$("#btnModalHistoryMember").trigger('click'); 
				$("#json_data").empty();
				$("#json_data").append( "<div class='m_datatable'></div>" );
				loadJsonTable();	
			}
		});
	});
</script>
@endpush

@push('script_header')
	<script src="js/jquery-3.3.1.min.js"></script>
@endpush