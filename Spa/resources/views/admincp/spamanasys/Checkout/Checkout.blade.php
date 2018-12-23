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



@section('titlePage','Thanh toán')
@section('headTitle','Thanh toán')

@section('content')
	<div class="m-content" id="checkout">
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
													Mã Khách hàng
												</label>
												@if($customerBooking->CustomerMember == 1)
												<input type="text" value="{{$customerBooking->getCustomerMember->CustomerMemberId}}" class="form-control m-input" aria-describedby="emailHelp" disabled>
												@else
												<input type="text" value="{{$customerBooking->getCustomer->CustomerId}}" class="form-control m-input" aria-describedby="emailHelp" disabled>
												@endif
											</div>
											<div class="form-group m-form__group">
												<label>
													Tên khách hàng
												</label>
												@if($customerBooking->CustomerMember == 1)
												<input type="text" value="{{$customerBooking->getCustomerMember->CustomerMemberName}}" class="form-control m-input" aria-describedby="emailHelp" disabled>
												@else
												<input type="text" value="{{$customerBooking->getCustomer->CustomerName}}" class="form-control m-input" aria-describedby="emailHelp" disabled>
												@endif
											</div>
											<div class="form-group m-form__group">
												<label>
													Số điện thoại
												</label>
												@if($customerBooking->CustomerMember == 1)
												<input type="number" value="{{$customerBooking->getCustomerMember->CustomerMemberPhoneNumber}}" class="form-control m-input" aria-describedby="emailHelp" disabled>
												@else
												<input type="number" value="{{$customerBooking->getCustomer->CustomerPhoneNumber}}" class="form-control m-input" aria-describedby="emailHelp" disabled>
												@endif
											</div>
											<div class="form-group m-form__group">
												<label>
													Nhân viên phục vụ
												</label>
												<input type="text" value="{{$customerBooking->getStaff->StaffName}}" class="form-control m-input m-input--solid" aria-describedby="emailHelp" readonly>
											</div>
											<div class="form-group m-form__group">
												<label>
													Dịch vụ đã dùng
												</label>
												<div class="m-checkbox-list">
													@foreach($listServices as $value)
													<label class="m-checkbox">
														<input type="checkbox" name="ServicesId[]" value="{{$value->getServices->ServicesId}}" checked disabled>
														{{$value->getServices->ServicesName}}
														<span></span>
													</label>
													@endforeach
												</div>	
											</div>
											<div class="form-group m-form__group">
												<label>
													Phòng
												</label>
												<input type="text" value="{{$customerBooking->getRoom->RoomName}}" class="form-control m-input m-input--solid" aria-describedby="emailHelp" readonly>
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
						<form action="{{ route('spa_checkout',['id' => $customerBooking->CustomerBookingId]) }}" method="POST">
							{{csrf_field()}}
							<table class="table m-table m-table--head-bg-brand table-responsive">
								<thead>
									<th style="width: 65%;">Dịch vụ</th>
									<th style="width: 35%">Giá</th>
								</thead>
								<tbody>
									@foreach($listServices as $value)
									<tr>
										<td style="width: 65%">{{$value->getServices->ServicesName}}</td>
										<td style="width: 35%">{{number_format($value->getServices->ServicesPrice,0,",",".")." VNĐ"}}</td>
									</tr>
									@endforeach()
									<tr>
										<td style="color: red;width: 65%">Tổng cộng</td>	
										<td style="color: red;width: 35%" id="total">{{number_format($price,0,",",".")." VNĐ"}}</td>
									</tr>
									<tr>
										<td>
											<span class="m-switch m-switch--sm m-switch--icon m-switch--outline m-switch--info">
												<label>
													<input id="switch" type="checkbox" name="">
													<span></span>
												</label>
											</span>
										</td>
										<td><input type="text" placeholder="Mã giảm giá" id="couponCode" class="form-control m-input" name="couponCode" disabled></td>
									</tr>
									<tr>
										<td>
											<p style="color: red;font-weight: bold" id="msgCoupon"></p>
											<p style="color: red;font-weight: bold" id="priceStock"></p>
											<p style="color: red;font-weight: bold" id="couponValue"></p>
											<p style="color: red;font-weight: bold" id="priceDiscounted"></p>
										</td>
										<td><input id="coupon-btn" type="button" class="btn btn-info" value="Áp dụng mã" disabled></td>
									</tr>
								</tbody>
							</table>
							<input type="hidden" name="checkCoupon" value="">
							<center><input type="submit" class="btn btn-primary" value="Thanh toán"/></center>
						</form>
					</div>
				</div>
				<!--end:: Widgets/Authors Profit-->
			</div>
		</div>
	</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){

		//Enable switch apply coupon
		$('#switch').click(function() {
			if($('#switch').is(':checked') == true) {
				$("#couponCode").removeAttr('disabled');
				$("#coupon-btn").removeAttr('disabled');
			}
			else{
				//GET STOCK VALUE
				$.ajax({
					url:'{{ route('spa_getStockMoneyValue') }}',
					type:'GET',
					datatype: 'TEXT',
					data: {
						idCustomerBooking: {{$customerBooking->CustomerBookingId}},
					},
					success:function(data){
						console.log(data);
						$("#total").html(data + " VNĐ");
					}
				});

				//END GET STOCK VALUE
				$('input[name="checkCoupon"]').val(false);
				$("#couponCode").val("");
				$("#msgCoupon").html("");
				$("#priceStock").html("");
				$("#couponValue").html("");
				$("#priceDiscounted").html("");
				// $("#total").html("");
				$("#couponCode").attr('disabled','disabled');
				$("#coupon-btn").attr('disabled','disabled');
			}
		});





		//Apply coupon
		$('#coupon-btn').on('click',function(){
            $.ajax({
               url:'{{ route('spa_ApplyCoupon') }}',
               type:'GET',
               datatype: 'JSON',
               data: {
               			couponCode: $('input[name="couponCode"]').val(),
               			idCustomerBooking: {{$customerBooking->CustomerBookingId}},
           			},
       			success:function(data){
       				$("#msgCoupon").html(data.msg);
       				if(data.status == true){
       					$('input[name="checkCoupon"]').val(true);
       				}
       				else{
       					$('input[name="checkCoupon"]').val(false);
       				}
       				$("#priceStock").html(data.priceStock);
       				$("#couponValue").html(data.couponValue);
       				$("#priceDiscounted").html(data.priceDiscounted);
       				$("#total").html(data.total);
       				console.log(data);
       			},
       			error: function(data){
       				$("#msgCoupon").html(data.msg);
       				$("#priceStock").html(data.priceStock);
       				$("#couponValue").html(data.couponValue);
       				$("#priceDiscounted").html(data.priceDiscounted);
       				$("#total").html(data.total);
       				console.log(data);
       			}
            });
		});


	});
</script>
@endpush