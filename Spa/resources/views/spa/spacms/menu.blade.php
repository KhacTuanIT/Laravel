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
			<li class="@yield('menu-bar--dashboard')" aria-haspopup="true" >
				<a  href="{{route('dashboard')}}" class="m-menu__link ">
					<i class="m-menu__link-icon flaticon-line-graph"></i>
					<span class="m-menu__link-title">
						<span class="m-menu__link-wrap">
							<span class="m-menu__link-text">
								Dashboard
							</span>
						</span>
					</span>
				</a>
			</li>
			<li class="m-menu__section">
				<h4 class="m-menu__section-text">
					Quản lý
				</h4>
				<i class="m-menu__section-icon flaticon-more-v3"></i>
			</li>
			<li class="@yield('menu-bar--class-collapse')" aria-haspopup="true"  data-menu-submenu-toggle="hover">
			{{-- <li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover"> --}}
				<a  href="#" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-layers"></i>
					<span class="m-menu__link-text">
						Quản lý nội dung
					</span>
					<i class="m-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="m-menu__submenu">
					<span class="m-menu__arrow"></span>
					<ul class="m-menu__subnav">
						<li class="m-menu__item  m-menu__item--parent" aria-haspopup="true" >
							<a  href="#" class="m-menu__link ">
								<span class="m-menu__link-text">
									Quản lý nội dung
								</span>
							</a>
						</li>
						<li class="@yield('menu-bar--gallery')" aria-haspopup="true" >
							<a  href="{{route('gallery-cms')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Bộ sưu tập
								</span>
							</a>
						</li>
						<li class="@yield('menu-bar--post')" aria-haspopup="true" >
							<a  href="{{route('post-cms')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Bài viết
								</span>
							</a>
						</li>
						<li class="@yield('menu-bar--blog')" aria-haspopup="true" >
							<a  href="{{route('blog-cms')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Blogs
								</span>
							</a>
						</li>
						<li class="@yield('menu-bar--service')" aria-haspopup="true" >
							<a  href="{{route('service-cms')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Dịch vụ
								</span>
							</a>
						</li>
						<li class="@yield('menu-bar--feedback')" aria-haspopup="true" >
							<a  href="{{route('feedback-cms')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Phản hồi
								</span>
							</a>
						</li>
						<li class="@yield('menu-bar--comment')" aria-haspopup="true" >
							<a  href="{{route('comment-cms')}}" class="m-menu__link ">
								<i class="m-menu__link-bullet m-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="m-menu__link-text">
									Bình luận
								</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="m-menu__item  m-menu__item--submenu" aria-haspopup="true"  data-menu-submenu-toggle="hover">
				<a  href="{{route('slider-cms')}}" class="m-menu__link m-menu__toggle">
					<i class="m-menu__link-icon flaticon-app	"></i>
					<span class="m-menu__link-text">
						Slider
					</span>
				</a>
			</li>
		</ul>
	</div>
	<!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->