@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}

@section('MenuBar_DashBoard','m-menu__item')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu m-menu__item--open m-menu__item--expanded')
@section('MenuBar_BookingForCustomer','m-menu__item m-menu__item--active')
{{-- END MENU BAR --}}

@section('titlePage','Đăng ký dịch vụ cho khách hàng')
@section('headTitle','Đăng ký dịch vụ cho khách hàng')

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
								ĐĂNG KÝ PHỤC VỤ CHO KHÁCH HÀNG
							</h3>
						</div>
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
										<form action="{{ route('spa_Booking') }}" method="POST" class="m-form m-form--fit m-form--label-align-right">
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-3">
													Tên khách hàng
												</label>
												<div class="col-lg-7 col-md-9 col-sm-12">
													<input class="form-control m-input" name="CustomerName" type="text" value="" id="example-text-input">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-3">
													SĐT:
												</label>
												<div class="col-lg-7 col-md-9 col-sm-12">
													<input class="form-control m-input" name="CustomerPhoneNumber" type="text" value="" id="example-text-input">
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-3">
													Gói dịch vụ
												</label>
												<div class="col-lg-7 col-md-9 col-sm-12">
													<select name="Services" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true">
													@foreach($listServices as $key => $value)
														<option value="{{$value->ServicesId}}">{{$value->ServicesName}}</option>
													@endforeach()
													</select>
												</div>
											</div>
											<div class="form-group m-form__group row">
												<label class="col-form-label col-lg-3 col-sm-3">
													Nhân viên tiếp nhận
												</label>
												<div class="col-lg-7 col-md-9 col-sm-12">
													<select name="StaffReceive" class="form-control m-bootstrap-select m_selectpicker" data-live-search="true" required>
														<option value="">-- Chọn nhân viên --</option>
														@foreach($listStaff as $key => $value)
														<option value="{{$value->StaffId}}">{{$value->StaffName}}</option>
													@endforeach()
													</select>
												</div>
											</div>

											<div class="form-group m-form__group row">
												<label class="col-lg-3 col-sm-3" style="padding: 0">
													<a class="btn btn-warning" id="btn-select-room"data-toggle="modal" data-target="#listroom">
														Chọn phòng
													</a>
												</label>
												<div class="col-lg-7 col-md-9 col-sm-12">
													<input class="form-control m-input" name="RoomId" type="hidden" value="" >
													<input class="form-control m-input" name="room_name" type="text" value="" disabled >
												</div>
											</div>
											<center><button type="submit" class="btn btn-primary"/>Đăng ký dịch vụ</center>
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
		<div class="col-xl-5">
			<!--begin:: Widgets/Authors Profit-->
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<h3 class="m-portlet__head-text">
								Bảng giá dịch vụ
							</h3>
						</div>
					</div>
				</div>
				<div class="m-portlet__body">
					<div class="m-section__content">
						<table class="table m-table m-table--head-bg-brand ">
							<thead class="thead-inverse">
								<tr>
									<th>Tên dịch vụ</th>
									<th>Thời gian</th>
									<th>Giá</th>
								</tr>
							</thead>
							<tbody>
								@foreach($listServices as $key => $value)
								<tr>
									<td>{{$value->ServicesName}}</td>
									<td>30 phút</td>
									<td>{{number_format($value->ServicesPrice,0,",",".")." VNĐ"}}</td>
								</tr>
								@endforeach
							</tbody>
						</table>
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
							@foreach($listRoom as $key => $value)
							<tr>
								<td>{{$value->RoomName}}</td>
								<td>{{$value->getRoomType->RoomTypeName}}</td>
								<td>10</td>
								<td>10</td>
								<td class="btn-choose">
									<button
									id="{{$value->RoomId}}"
									style="width: 108px"
									type="button"
									class="btn btn-warning"
									target-name="{{$value->RoomName}}"
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
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">
					Xác nhận
				</button>
			</div>
		</div>
	</div>
	{{-- END MODAL --}}
	</div>

<!--End::Main Portlet-->

<!--Begin::Main Portlet Calender-->
</div>

@endsection

@section('script')
<script type="text/javascript">
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
					$('input[name="room_id"]').val(room_id);
					$('input[name="room_name"]').val(room_name+" ["+typeroom+"]");
			// alert(test);
		});
	});
</script>
{{-- <script type="text/javascript">
	$(document).ready(function(){
		$.ajax({
			url: window.location.href,
			type: 'POST',
			dataType: 'JSON',
			success: function(data){
				console.log(data);
				console.log(data.vi);
			}
		});
	});
</script> --}}
@endsection

@section('script_header')
	<script src="js/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
@endsection