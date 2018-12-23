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



@section('titlePage','Bảng điều khiển Spa')
@section('headTitle','Bảng điều khiển ')
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
</ul>
@endsection

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
								<a href="{{ route('spa_showBooking') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
									<span>
										<i class="la la-cart-plus"></i>
										<span>
											Đăng ký mới
										</span>
									</span>
								</a>
								<div class="m-separator m-separator--dashed d-xl-none"></div>
							</div>
						</div>
					</div>
					<!--end: Search Form -->
					<!--begin: Datatable -->
					<div class="m_datatable" id="api_methods"></div>
					<!--end: Datatable -->
				</div>
			</div>
		</div>
		
		
	</div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
	var DefaultDatatableDemo = function() {
    var t = function() {
        var t = {
                data: {
                    type: "remote",
                    source: {
                        read: {
                        	method: "GET",
                            url: "{{ route('spa_jsda1') }}"
                        }
                    },
                    pageSize: 10,
                    saveState: {
                        cookie: false,
                        webstorage: false
                    },
                    serverPaging: false,
                    serverFiltering: false,
                    serverSorting: false,
                    autoColumns: false,
                },
                layout: {
                    theme: "default",
                    class: "",
                    scroll: !0,
                    height: 550,
                    footer: !1
                },
                sortable: true,
                pagination: true,
                search: {
                    input: $("#generalSearch")
                },
                columns: [
                //{
                //     field: "CustomerBookingId",
                //     title: "#",
                //     sortable: !1,
                //     width: 40,
                // }, 
                {
                    field: "CustomerBookingId",
                    title: "#",
                    width: 30,
                },{
                    field: "CustomerName",
                    title: "Tên khách hàng",
                    width: 150,
                },{
                    field: "CustomerPhoneNumber",
                    title: "Số điện thoại",
                    width: 150,
                },{
                    field: "RoomName",
                    title: "Phòng",
                    width: 150,
                },{
                    field: "BookingTime",
                    title: "Thời gian vào",
                    width: 150,
                },{
                    field: "Hành động",
                    width: 110,
                    title: "Hành động",
                    overflow: "visible",
                    template: function(t) {
                        return '<a href="{{route('spa_showDetailCustomer',['id'=> ''])}}/'+t.CustomerBookingId+'" class="m-portlet__nav-link btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" title="Edit details">\t\t\t\t\t\t\t<i class="la la-edit"></i>\t\t\t\t\t\t</a>\t\t\t\t\t\t<a href="#" class="m-portlet__nav-link btn m-btn m-btn--hover-danger m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">\t\t\t\t\t\t\t<i class="la la-trash"></i>\t\t\t\t\t\t</a>\t\t\t\t\t'
                    }
                },{
                    field: "Thanh toán",
                    title: "Thanh toán",
                    sortable: !1,
                    overflow: "visible",
                    template: function(t) {
                        return '<a href="{{route('spa_showCheckout',['id'=> ''])}}/'+t.CustomerBookingId+'" class="btn btn-outline-primary"><span><span>Thanh toán</span></span></a>'
                    }
                }
                ]
            },

        // e.reload();
    	a = $(".m_datatable").mDatatable(t);
    	setInterval( function () {
    		console.log("receive_data");
    		$.get('{{ route('spa_getSessionCustomer') }}', function(data){ 
    			console.log(data);
    			if(data == 1){
    				a.destroy();
    				a = $(".m_datatable").mDatatable(t);
    			}
    		});
    	}, 1000);
       //  	setInterval( function () {
       //      	// a.destroy()
    			// // a = $(".m_datatable").mDatatable(t);
    			// // a.reload();
       //  		a.load();
	      //   	console.log("refreshed");
       //  	}, 3000);
    	// console.log(a.getPageSize());
        // setTimeout(function(){
        // }, 3000);
        

        // $("#m_datatable_destroy").on("click", function() {
        // }), $("#m_datatable_init").on("click", function() {
        //     e = $(".m_datatable").mDatatable(t)
        // }), $("#m_datatable_reload").on("click", function() {
        //     e.reload()
        // }), $("#m_datatable_sort").on("click", function() {
        //     e.sort("ShipCity")
        // }), $("#m_datatable_get").on("click", function() {
        //     var t = e.setSelectedRecords().getColumn("ShipCity").getValue();
        //     "" === t && (t = "Select checbox"), $("#datatable_value").html(t)
        // }), $("#m_datatable_check").on("click", function() {
        //     var t = $("#m_datatable_check_input").val();
        //     e.setActive(t)
        // }), $("#m_datatable_check_all").on("click", function() {
        //     e.setActiveAll(!0)
        // }), $("#m_datatable_uncheck_all").on("click", function() {
        //     e.setActiveAll(!1)
        // })
    };
    return {
        init: function() {
            t()
        }
    }
}();
jQuery(document).ready(function() {
    DefaultDatatableDemo.init()
});
</script>
@endpush