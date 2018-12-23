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
		<a href="{{ route('spa_showDetailCustomer',['id' => $customerBooking->CustomerBookingId]) }}" class="m-nav__link">
			<span class="m-nav__link-text">
				Xem chi tiết
			</span>
		</a>
	</li>
</ul>
@endsection

@section('content')
<style type="text/css">
	#loader-wrapper {
		display: none;
	  	position: absolute;
	  	top: 0;
	  	left: 0;
	  	width: 100%;
	  	height: 100%;
	  	z-index: 1000;
	  	background: #eceff1;
	}

	#loader-wrapper .loader-section {
		display: none;
	  	position: absolute;
	  	top: 0;
	  	width: 51%;
	  	height: 100%;
	  	background: #eceff1;
	  	z-index: 1000;
	    -webkit-transform: translateX(0);
	    -ms-transform: translateX(0);
	  	transform: translateX(0);
	}

	#loader-wrapper .loader-section.section-left {
	  	left: 0;
	}

	#loader-wrapper .loader-section.section-right {
	  	right: 0;
	}

	#loader {
		display: none;
	  	position: relative;
	  	left: 50%;
	  	top: 300px;
	  	width: 150px;
	  	height: 150px;
	  	margin: -75px 0 0 -75px;
	  	border-radius: 50%;
	  	border: 3px solid transparent;
	  	border-top-color: #3498db;
	  -webkit-animation: spin 2s linear infinite;
	  	animation: spin 2s linear infinite;
	  z-index: 1001;
	}

	#loader:before {
	  	content: "";
	  	position: absolute;
	  	top: 5px;
	  	left: 5px;
	  	right: 5px;
	  	bottom: 5px;
	  	border-radius: 50%;
	  	border: 3px solid transparent;
	  	border-top-color: #e74c3c;
	  -webkit-animation: spin 3s linear infinite;
	  	animation: spin 3s linear infinite;
	}

	#loader:after {
	  	content: "";
	  	position: absolute;
	  	top: 15px;
	  	left: 15px;
	 	right: 15px;
	  	bottom: 15px;
	  	border-radius: 50%;
	  	border: 3px solid transparent;
	  	border-top-color: #f9c922;
	  -webkit-animation: spin 1.5s linear infinite;
	  	animation: spin 1.5s linear infinite;
	}

	@keyframes spin {
	  0% {
	    -webkit-transform: rotate(0deg);
	    -ms-transform: rotate(0deg);
	    transform: rotate(0deg);
	  }
	  100% {
	    -webkit-transform: rotate(360deg);
	    -ms-transform: rotate(360deg);
	    transform: rotate(360deg);
	  }
	}

</style>

<div class="m-content">

	<!--Begin::Main Portlet-->
	<div class="row">
		<div class="col-lg-12" >
			@include('admincp.spamanasys.notifications.notifications')
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								THÔNG TIN CHI TIẾT KHÁCH HÀNG 
								@if($customerBooking->CustomerMember)
								<span style="text-transform: uppercase;color: red">
									{{' [KHÁCH HÀNG THÀNH VIÊN]'}}
								</span>
								@else
								<span style="text-transform: uppercase;color: red">
									{{' [KHÁCH VÃNG LAI]'}}
								</span>
								@endif
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
								<input id="edit" type="checkbox">
								<span></span>
							</label>
						</span>
					</div>
				</div>
				<div id="loader-wrapper">
			      	<div id="loader"></div>
			      	<div class="loader-section section-left"></div>
			      	<div class="loader-section section-right"></div>
			    </div>

				<form  action="{{ route('spa_editCustomer') }}" method="POST" class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="Rowpage">
					<div class="m-portlet__body"  id="pageContent">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Họ tên:
								</label>
								@if($customerBooking->CustomerMember == 1)
								<input type="text" value="{{$customerMember->CustomerMemberName}}" class="form-control m-input m-input--solid" readonly>
								@else
								<input type="text" value="{{$customer->CustomerName}}" class="form-control m-input m-input--solid" readonly>
								@endif
							</div>
							<div class="col-lg-4">
								<label class="">
									Số điện thoại:
								</label>
								@if($customerBooking->CustomerMember == 1)
								<input type="number" value="{{$customerMember->CustomerMemberPhoneNumber}}" class="form-control m-input  m-input--solid" readonly>
								@else
								<input type="number" value="{{$customer->CustomerPhoneNumber}}" class="form-control m-input  m-input--solid" readonly>
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
												<input type="radio" name="gender" value="1" checked 
												>
												Nam
												<span></span>
												</label>'
											!!} 
										@else 
											{!!
												'<label class="m-radio m-radio--bold m-radio--state-danger">
												<input type="radio" name="gender" value="0" checked 
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
												</label>'
											!!} 
											@else 
												{!!
												'<label class="m-radio m-radio--bold m-radio--state-danger">
													<input type="radio" name="gender" value="0" checked 
													>
													Nữ
													<span></span>
												</label>' 
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
								<input type="text" value="{{$customerBooking->getRoom->RoomName." [".$customerBooking->getRoom->getRoomType->RoomTypeName."]"}}" class="form-control m-input m-input--solid" readonly>
							</div>
							<div class="col-lg-4">
								<label class="">
									Dịch vụ sử dụng:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<div class="m-checkbox-list">
										@foreach($services as $value)
										<label class="m-checkbox">
											<input type="checkbox" name="ServicesId[]" value="{{$value->getServices->ServicesId}}" checked disabled>
											{{$value->getServices->ServicesName}}
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
									<input type="text" class="form-control m-input m-input--solid" value="{{$customerBooking->getStaff->StaffName}}" readonly>
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-map-marker"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-12">
								<label class="col-lg-12">
									Thời gian tiếp nhận:
								</label>
								<div class="m-input-icon m-input-icon--right">
									<input type="text" class="form-control m-input m-input--solid" value="{{date("H:i d-m-Y",strtotime($customerBooking->CustomerBookingTime))}}" readonly>
									<span class="m-input-icon__icon m-input-icon__icon--right">
										<span>
											<i class="la la-bookmark-o"></i>
										</span>
									</span>
								</div>
							</div>
						</div>
					</div>
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									<a href="{{ route('spa_showCheckout',['id' => $value->CustomerBookingId]) }}" class="btn btn-primary">
										Thanh Toán
									</a>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
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
@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
		$('#edit').click(function() {
			if($('#edit').is(':checked') == true) {
				$('#loader-wrapper').show();
				$('#loader-section').show();
				$('#loader').show();
				$('#loader-wrapper').delay(300).fadeOut("slow");
				$('#loader-section').delay(300).fadeOut("slow");
				$('#loader').delay(300).fadeOut("slow");
				
				$("#Rowpage").load("{{ route('spa_showfrmEditDetail',['id' => $customerBooking->CustomerBookingId]) }}"+" #Rowpage #pageContent");
				$('.btn-choose').children().removeClass("btn-success activate");
				$('.btn-choose').children().addClass("btn-warning").text("Chọn phòng");
			}
			if($('#edit').is(':checked') == false) {
				$('#loader-wrapper').show();
				$('#loader-section').show();
				$('#loader').show();
				$('#loader-wrapper').delay(300).fadeOut("slow");
				$('#loader-section').delay(300).fadeOut("slow");
				$('#loader').delay(300).fadeOut("slow");
				$("#Rowpage").load("{{ route('spa_showDetailCustomer',['id' => $customerBooking->CustomerBookingId]) }}"+" #Rowpage #pageContent");

			}
		});
	});
</script>
<script src="assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
{{-- JS SCRIPT MODAL --}}
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
</script>
{{-- END JS SCRIPT MODAL--}}

@endpush

@push('script_header')
	<script src="js/jquery-3.3.1.min.js"></script>
@endpush
