@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}
@section('MenuBar_DashBoard','m-menu__item  m-menu__item--active')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu')
@section('MenuBar_BookingForCustomer','m-menu__item')
{{-- END MENU BAR --}}



@section('titlePage','Xem chi tiết')
@section('headTitle','Xem chi tiết')


@section('content')
<div class="m-content">
	<!--Begin::Main Portlet-->

	<div class="row">
		<div class="col-lg-12" >
			<div class="m-portlet">
				<div class="m-portlet__head">
					<div class="m-portlet__head-caption">
						<div class="m-portlet__head-title">
							<span class="m-portlet__head-icon m--hide">
								<i class="la la-gear"></i>
							</span>
							<h3 class="m-portlet__head-text">
								THÔNG TIN CHI TIẾT KHÁCH HÀNG <span style="text-transform: uppercase;color: red">{{$customer->CustomerName}}</span>
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
				<form class="m-form m-form--fit m-form--label-align-right m-form--group-seperator-dashed" id="Rowpage">
					<div class="m-portlet__body"  id="pageContent">
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label>
									Họ tên:
								</label>
								<input type="text" value="{{$customer->CustomerName}}" class="form-control m-input m-input--solid" readonly>
							</div>
							<div class="col-lg-4">
								<label class="">
									Số điện thoại:
								</label>
								<input type="number" value="{{$customer->CustomerPhoneNumber}}" class="form-control m-input  m-input--solid" readonly>
							</div>
							<div class="col-lg-4">
								<label>
									Giới tính:
								</label>
								<div class="m-radio-inline">
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
								</div>
							</div>
						</div>
						<div class="form-group m-form__group row">
							<div class="col-lg-4">
								<label class="">
									Phòng:
								</label>
								<input type="email" value="{{$customerBooking->getRoom->RoomName}}" class="form-control m-input m-input--solid" readonly>
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
				</form>
			</div>
		</div>
	</div>

</div>

@endsection

@push('scripts')
<script type="text/javascript">
	$(document).ready(function(){
	

		$('#edit').click(function() {
      var isChecked = $('#rdSelect').is(':checked');

			if($('#edit').is(':checked') == true) {
				$("#Rowpage").load("{{ route('spa_showfrmEditDetail',['id' => $customerBooking->CustomerBookingId]) }}"+" #Rowpage #pageContent");
			}
			if($('#edit').is(':checked') == false) {
				$("#Rowpage").load("{{ route('spa_showDetailCustomer',['id' => $customerBooking->CustomerBookingId]) }}"+" #Rowpage #pageContent");
			}
		});
	});
</script>
<script src="assets/demo/default/custom/components/forms/widgets/bootstrap-select.js" type="text/javascript"></script>
@endpush

@push('script_header')
	<script src="js/jquery-3.3.1.min.js"></script>

@endpush
