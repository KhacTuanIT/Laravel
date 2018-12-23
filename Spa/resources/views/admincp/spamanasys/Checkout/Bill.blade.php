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



@section('titlePage','Hoá đơn')
@section('headTitle','Thanh toán')
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
		<a href="{{ route('spa_showCustomer') }}" class="m-nav__link">
			<span class="m-nav__link-text">
				Khách hàng đang được phục vụ
			</span>
		</a>
	</li>
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
								THANH TOÁN DỊCH VỤ 
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
						<center>
							<i style="font-size: 85px; color: {{$iconColor}}" class="{{$icon}}"></i>
							<h2 style="font-weight: bold">{{$Message}}</h2><br>
						</center>
						<div class="form-group m-form__group row">
							<div class="col-lg-3">
							</div>
							<div class="col-lg-6">
								<table class="table">
									<tr>
										<th>Họ và tên:</th>
										<th>{{$CustomerName}}</th>
									</tr>
									<tr>
										<th>Số điện thoại:</th>
										<th>{{$CustomerPhoneNumber}}</th>
									</tr>
									<tr>
										<th>Giới tính: </th>
										<th>
											 @if($CustomerGender == 1)
											{{"Nam"}}
											@else
												{{"Nữ"}}
											@endif
										</th>
									</tr>
									<tr>
										<th>Tiền thanh toán: </th>
										<th>{{number_format($orderPrice,0,",",".")." VNĐ"}}</th>
									</tr>
								</table>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
					</div>
					@if($status == true)
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-4"></div>
								<div class="col-lg-8">
									@if($customerMember == true)
										<a target="_blank" href="{{ route('spa_printInvoice',['member'=> "CustomerMember",'id' => $idToInvoice]) }}" class="btn btn-info">
											In Hoá Đơn
										</a>
									@else
										<a target="_blank" href="{{ route('spa_printInvoice',['member'=> "Customer",'id' => $idToInvoice]) }}" class="btn btn-info">
											In Hoá Đơn
										</a>
									@endif
									<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showRatingStaff">
										Đánh giá nhân viên
									</button>
									<a href="{{ route('spa_showDashBoard') }}" class="btn btn-primary">
										Trang chủ
									</a>
								</div>
							</div>
						</div>
					</div>
					@endif
					@if($status == false)
					<div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
						<div class="m-form__actions m-form__actions--solid">
							<div class="row">
								<div class="col-lg-5"></div>
								<div class="col-lg-7">
									<a href="{{ route('spa_checkout',['id'=>$idCustomer]) }}" class="btn btn-primary">
										Quay lại
									</a>
								</div>
							</div>
						</div>
					</div>
					@endif
				</div>

			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="showRatingStaff" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">
					Đánh giá nhân viên
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">
						&times;
					</span>
				</button>
			</div>
			<div class="modal-body">
				<h3 id="TitleRatingMessage" style="text-align: center;color: green;font-weight: bold;display: none" ></h3>
				<div id="box-star" style="text-align: center;">
					<i style="font-size: 50px;cursor: pointer;" class="fa fa-star fa-2x"></i>
					<i style="font-size: 50px;cursor: pointer;" class="fa fa-star fa-2x"></i>
					<i style="font-size: 50px;cursor: pointer;" class="fa fa-star fa-2x"></i>
					<i style="font-size: 50px;cursor: pointer;" class="fa fa-star fa-2x"></i>
					<i style="font-size: 50px;cursor: pointer;" class="fa fa-star fa-2x"></i>
					<div style="padding-top: 10px"></div>
						<input type="hidden" name="ratestarvalue" id="ratestarvalue" value="0">
						<input type="submit" id="submitRating" class="btn btn-success" value="Đánh giá">
				</div>
				<div style="padding-top: 20px"></div>
				<table class="table">
					<tr>
						<th>Họ và tên:</th>
						<th class="NameStaff"></th>
					</tr>
					<tr>
						<th>Số điện thoại:</th>
						<th class="PhoneNumberStaff"></th>
					</tr>
					<tr>
						<th>Giới tính: </th>
						<th class="StaffGender">
							
						</th>
					</tr>
					<tr>
						<th>Điểm Rating: </th>
						<th id="RatingPoint">
							
						</th>
					</tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">
					Thoát
				</button>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function() {
		var all =  $('#box-star > i').length;
		$('#box-star > i').mouseenter(function() {
			// var all =  $('#box-star > i').length;
			var index = $(this).index();
			for($i = 0; $i <= index; $i++) {
				$('#box-star > i:eq('+$i+')').removeClass('checked');
				$('#box-star > i:eq('+$i+')').addClass('checked');
				$('#box-star > i:eq('+$i+')').css("color", "#2abe60");

			}
			for($i = index+1; $i < all; $i++) {
				$('#box-star > i:eq('+$i+')').removeClass('checked');
				$('#box-star > i:eq('+$i+')').css("color", "black");

			}
		});
		$(document).on('click','#box-star > i', function() {
			var index = $(this).index();
			$('#ratestarvalue').val(index+1);
			$('#submitRating').val('Đánh giá ' + (index+1) + ' sao');
			for($i = 0; $i <= index; $i++) {
				$('#box-star > i:eq('+$i+')').removeClass('checked');
				$('#box-star > i:eq('+$i+')').addClass('checked');
			}
			for($i = index+1; $i < all; $i++) {
				$('#box-star > i:eq('+$i+')').removeClass('checked');
			}
		});
	});


	$(document).ready(function(){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
			$.ajax({
				url:'{{ route('spa_getinforstaff',['id' => $idStaff]) }}',
				type:'GET',
				datatype: 'JSON',
				success:function(data){
					console.log(data);
					$(".NameStaff").text(data.StaffName);
					$(".PhoneNumberStaff").text(data.StaffPhoneNumber);
					$(".StaffGender").text(data.StaffGender);
					$("#RatingPoint").text(data.StaffRating);
				}
			});
		$("#submitRating").on("click",function(){
			$.ajax({
				url:'{{ route('spa_setRatingStaff',['id' => $idStaff]) }}',
				type:'POST',
				datatype: 'JSON',
				data: {
					starValue : $("#ratestarvalue").val(),
				},
				success:function(data){
					console.log(data);
					$("#box-star").hide();
					$("#TitleRatingMessage").show().text("ĐÁNH GIÁ THÀNH CÔNG");
					$("#RatingPoint").text(data.staffRating);
					// $("#total").html(data + " VNĐ");
				}
			});
		});
	});
</script>
@endpush

@push('script_header')
<script src="js/jquery-3.3.1.min.js"></script>
@endpush
