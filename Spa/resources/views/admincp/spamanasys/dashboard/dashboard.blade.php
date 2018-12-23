@extends('admincp.spamanasys.master')

{{-- MENU BAR --}}
@section('MenuBar_DashBoard','m-menu__item  m-menu__item--active')
@section('MenuBar_TitleBookingForCustomer','m-menu__item m-menu__item--submenu')
@section('MenuBar_BookingForCustomer','m-menu__item')
@section('MenuBar_ListCustomerBooking','m-menu__item')
@section('MenuBar_TitleCustomerMember','m-menu__item m-menu__item--submenu')
@section('MenuBar_AddCustomerMember','m-menu__item')
@section('MenuBar_ListCustomerMember','m-menu__item')
@section('MenuBar_TitleStaffManagement','m-menu__item m-menu__item--submenu ')
@section('MenuBar_AddStaff','m-menu__item')
@section('MenuBar_ListStaff','m-menu__item')

{{-- END MENU BAR --}}



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
										Khách hàng
									</h4>
									<br>
									<span class="m-widget24__desc">
										Đang trong Spa
									</span>
									<span class="m-widget24__stats m--font-brand">
										{{$customerBooking->count()}}
									</span>
									<div class="m--space-10"></div>
									<div class="progress m-progress--sm">
										<div class="progress-bar m--bg-brand" role="progressbar" style="width:100% ;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
										{{-- <span class="m-widget24__change">
											Change
										</span> --}}
										{{-- <span class="m-widget24__number">
											78%
										</span> --}}
									</div>
								</div>
								<!--end::Total Profit-->
							</div>
							<div class="col-md-12 col-lg-6 col-xl-3">
								<!--begin::New Feedbacks-->
								<div class="m-widget24">
									<div class="m-widget24__item">
										<h4 class="m-widget24__title">
											Nhân viên
										</h4>
										<br>
										<span class="m-widget24__desc">
											Đang làm việc
										</span>
										<span class="m-widget24__stats m--font-info">
											{{$ovvStaffActive}}
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-info" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="m-widget24__change">
											Tổng nhân viên
										</span>
										<span class="m-widget24__stats m--font-info" style="padding-top: 4%">
											{{$ovvNumberStaff}}
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
											Khách đã nhận
										</h4>
										<br>
										<span class="m-widget24__desc">
											Trong ngày
										</span>
										<span class="m-widget24__stats m--font-danger">
											567
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-danger" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
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
											Khách hàng thành viên
										</h4>
										<br>
										<span class="m-widget24__desc">
											
										</span>
										<span class="m-widget24__stats m--font-success">
											{{$ovvNumberCustomerMember}}
										</span>
										<div class="m--space-10"></div>
										<div class="progress m-progress--sm">
											<div class="progress-bar m--bg-success" role="progressbar" style="width: 100%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<span class="m-widget24__change">										</span>
										<span class="m-widget24__number">
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
		<div class="m-portlet m-portlet--mobile">
			<div class="m-portlet__head">
				<div class="m-portlet__head-caption">
					<div class="m-portlet__head-title">
						<h3 class="m-portlet__head-text">
							BẢNG ĐIỀU KHIỂN SPA
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
									
								</div>
							</div>
						</li>
					</ul>
				</div>
			</div>
			<div class="m-portlet__body">
				<ul class="nav nav-pills nav-fill" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#m_tabs_5_1">
							Phòng
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#m_tabs_5_2">
							Nhân viên
						</a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="m_tabs_5_1" role="tabpanel">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<div class="row">
								@foreach($room as $key => $value)
									<div class="col-sm-4 div-allRoom">
										<button style="margin : 2px 0;width: 100%" class="btn btn-outline-info m-btn m-btn--icon m-btn--outline-2x" id="btn-view-room" data-id="{{$value->RoomId}}">
											{{$value->RoomName}}
										</button>
									</div>
								@endforeach
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<center><h4 class="tblNameRoom"></h4></center>
								<p class="tblRoomBlank"></p>
								<div class="m_datatable"></div>
								<table class="table table-responsive m-table m-table--head-bg-success table-listcustomer" style="display: none">
									<thead>
										<tr>
											<th>
												#
											</th>
											<th>
												Tên khách
											</th>
											<th>
												NV tiếp nhận
											</th>
											<th>
												Thời gian vào
											</th>
											<th>
												KH Thành viên
											</th>
											<th>
												Chi tiết
											</th>
										</tr>
									</thead>
									<tbody class="tbody-list-customer">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="m_tabs_5_2" role="tabpanel">
						<div class="json_data">
							<div class="m_datatable_staff"></div>	
						</div>
					</div>
				</div>
		</div>
	</div>
</div>

@endsection

@push('scripts')
{{-- <script src="assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
--}}



<script type="text/javascript">
	$(document).ready(function() {
		$('.div-allRoom').children().on('click',function(){
			var roomId = $(this).attr("data-id");
			if($("#"+roomId).on('click')){
				console.log("Đã click phòng id: " + roomId);
				$.ajax({
					url: "{{ route('spa_DashboardAjaxViewRoom')}}",
					type: 'GET',
					dataType: 'JSON',
					data:{
						idRoom: roomId,  
					},
					success: function(data){
						console.log(data)
						$('.table-listcustomer').show();
						$('.tblNameRoom').text("Phòng "+data.listRoom.RoomName);
						$('.tblRoomBlank').text("Chỗ trống "+data.listRoom.RoomBlank);
						var tableInfo = '';
						if(data.customerBooking.length == 0){
							tableInfo += 
							'<tr>'+
							'<td></td>' +
							'<td>Không có khách nào trong phòng</td>' +
							'</tr>';
						}else{
							for (var i = 0; i < data.customerBooking.length; i++) {
								if(data.customerBooking[i].CustomerMember == 0){
									data.customerBooking[i].CustomerMember = "<i class='fa fa-remove' style='color:red'></i>";
								}
								else{
									data.customerBooking[i].CustomerMember = "<i class='fa fa-check' style='color:green'></i>";
								}
								tableInfo += 
								"<tr>"+
								"<td>" + (i+1) + "</td>" +
								"<td>" + data.customerBooking[i].CustomerName + "</td>" +
								"<td>" + data.customerBooking[i].StaffId + "</td>" +
								"<td>" + data.customerBooking[i].CustomerBookingTime + "</td>" +
								"<td>" + data.customerBooking[i].CustomerMember + "</td>" +
								"<td> <a href='{{route('spa_showDetailCustomer',['id'=> ''])}}/"+ data.customerBooking[i].CustomerBookingId + "' class='btn btn-secondary m-btn m-btn--icon m-btn--icon-only'> <i class='la la-archive'></i> </a></td>" +
								"</tr>";
							}
						}

						$(".tbody-list-customer").html(tableInfo);
					},
					error: function(data){
						console.log(data);
					}
				});
			}
		});
	});
</script>


<script type="text/javascript">
	function loadJsonDatatableStaff(){
		var DatatableJsonRemoteDemo = function() {
			var t = function() {
				var t = $(".m_datatable_staff").mDatatable({
					data: {
						type: "remote",
                    source: {
                    	read: {
                    		method: "GET",
                    		url: "{{ route('spa_responseJsonListStaff')}}",
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
                	field: "StaffName",
                	title: "Tên nhân viên",
                	textAlign: "center",
                }, {
                	field: "StaffPhoneNumber",
                	title: "Số điện thoại",
                	// width: 200,
                	textAlign: "center",
                }, {
                	field: "StaffActive",
                	title: "Trạng thái",
                	// width: 200,
                	textAlign: "center",

                },{
                	field: "StaffWorkAtRoom",
                	title: "Phòng đang làm việc",
                	width: 200,
                	textAlign: "center",

                },]
            }),
				// e = t.getDataSourceQuery();
				// a = $(".m_datatable_staff").mDatatable(t);
				u = 4;
				e = $(".m_datatable_staff").mDatatable(t);
				$('.m_datatable_staff table:last-child').remove();
				setInterval( function () {
					console.log("receive_data");
					$.ajax({
						url: "{{ route('spa_getSessionStaff')}}",
						type: 'GET',
						dataType: 'JSON',
						success: function(data){
							console.log(data);
							if(data == 1){
								// console.log
								e.destroy();
								loadReInit();
							}
						},
					});
				}, 1000,e,t);




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
	function loadReInit(){
		$('.m_datatable_staff').children().remove();
		$("#json_data").empty();
		$("#json_data").append( "<div class='m_datatable_staff'></div>");
		loadJsonDatatableStaff();
		$('.m_datatable_staff').children().remove();
	}
	loadJsonDatatableStaff();
</script>




@endpush

@push('script_header')
<script src="js/jquery-3.3.1.min.js"></script>
@endpush