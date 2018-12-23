<div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
	<!-- BEGIN: Left Aside -->
	<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
		<i class="la la-close"></i>
	</button>
	<div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-dark ">
		<!-- BEGIN: Aside Menu -->
		<div 
		id="m_ver_menu" 
		class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " 
		data-menu-vertical="true"
		data-menu-scrollable="false" data-menu-dropdown-timeout="500"  
		>
		<ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
			<li class="@yield('MenuBar_DashBoard')" aria-haspopup="true" >
				<a  href="{{ route('spa_showDashBoard') }}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Bảng điều khiển
							</span>
							{{-- <span class="m-menu__link-badge">
								<span class="m-badge m-badge--danger">
									2
								</span>
							</span> --}}
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Quản lý dịch vụ
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>
			<li class="@yield('MenuBar_TitleBookingForCustomer')" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-layers"></i>
					<span class="m-menu__link-text">
						Dịch vụ
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
							<a  href="#" class="m-menu__link ">
								<span class="m-menu__link-text">
									Dịch vụ
								</span>
							</a>
						</li>
						<li class="@yield('MenuBar_BookingForCustomer')" aria-haspopup="true" >
							<a  href="{{route('spa_showBooking')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Đăng ký dịch vụ
								</span>
							</a>
						</li>
						<li class="@yield('MenuBar_ListCustomerBooking')" aria-haspopup="true" >
							<a  href="{{ route('spa_showCustomer') }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Khách đang được phục vụ
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="@yield('MenuBar_TitleCustomerMember')" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-multimedia-1"></i>
					<span class="m-menu__link-text">
						Khách hàng thành viên
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
							<a  href="#" class="m-menu__link ">
								<span class="m-menu__link-text">
									Khách hàng thành viên
								</span>
							</a>
						</li>
						<li class="@yield('MenuBar_AddCustomerMember')" aria-haspopup="true" >
							<a  href="{{ route('spa_showAddMember') }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Thêm KH thành viên
								</span>
							</a>
						</li>
						<li class="@yield('MenuBar_ListCustomerMember')" aria-haspopup="true" >
							<a href="{{route('spa_showListCustomerMember')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Danh sách KH thành viên
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					QUẢN LÝ NHÂN VIÊN
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>
			<li class="@yield('MenuBar_TitleStaffManagement')" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-layers"></i>
					<span class="m-menu__link-text">
						QUẢN LÝ NHÂN VIÊN
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
							<a  href="#" class="m-menu__link ">
								<span class="m-menu__link-text">
									QUẢN LÝ NHÂN VIÊN
								</span>
							</a>
						</li>
						<li class="@yield('MenuBar_AddStaff')" aria-haspopup="true" >
							<a  href="{{route('spa_showAddStaff')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Thêm mới nhân viên
								</span>
							</a>
						</li>
						<li class="@yield('MenuBar_ListStaff')" aria-haspopup="true" >
							<a  href="{{ route('spa_showListStaff') }}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Danh sách nhân viên
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->