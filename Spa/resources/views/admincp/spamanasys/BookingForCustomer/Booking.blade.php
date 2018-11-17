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
					<!--begin::Content-->
					<div class="tab-content">
						<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
							<!--begin::m-widget5-->
							<div class="m-widget5">
								<div class="m-widget5__item">
									<div class="m-widget1__item">
										<form action="{{route('spa_Booking')}}" method="POST" class="m-form m-form--fit m-form--label-align-right">
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
																<label class="m-checkbox">
																	<input type="checkbox" name="ServicesId[]"  value="{{$value->ServicesId}}" 
																	@if(is_array(old('ServicesId')) && in_array($value->ServicesId, old('ServicesId'))) checked @endif
																	>
																	{{$value->ServicesName}}
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
											<center><button type="submit" class="btn btn-primary"/>Đăng ký dịch vụ</button></center>
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
								@foreach($services as $key => $value)
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
							@foreach($room as $key => $value)
							<tr>
								<td>{{$value->RoomName}}</td>
								<td>{{$value->getRoomType->RoomTypeName}}</td>
								<td>{{$value->getRoomType->RoomTypeCapacity}}</td>
								<td>
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

@push('scripts')
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
					$('input[name="RoomId"]').val(room_id);
					$('input[name="room_name"]').val(room_name+" ["+typeroom+"]");
			// alert(test);
		});
	});
	
	// $.ajaxSetup({
	// 	headers: {
	// 		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 //        }
	// });

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

@endpush

@push('script_header')
	<script src="js/jquery-3.3.1.min.js"></script>
@endpush