<div id="preloader">
  	<div id="status">&nbsp;</div>
</div>
<nav class="navbar navbar-spa" id="navbar">
	<div class="container full-nav">
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav ">
				<li><a href="{{route('home')}}">home</a></li>
				<li><a href="{{route('services')}}">service</a></li>
				<li><a href="{{route('pricing')}}">pricing</a></li>
				<li><a href="{{route('gallery')}}">gallery</a></li>
				<li class="logo"><a href="{{route('home')}}"><img src="assets/images/logo.png"></a></li>
				<li><a href="{{route('blog')}}">blog</a></li>
				<li><a href="{{route('signin')}}">sign in</a></li>
				<li><a href="{{route('signup')}}">sign up</a></li>
				<li><a href="{{route('contact')}}">contact</a></li>
			</ul>
			
		</div>
	</div>
	<div class="container left-nav">
		<div class="col-xs-8">
			<img src="assets/images/logo.png" width="100%">
		</div>
		<div class="col-xs-4 text-right">
			<button type="button" data-toggle="collapse" data-target=".navbar-main" class="navbar-toggle collapsed">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="col-xs-12 navbar-main navbar-collapse collapse">
			<div class="nav nav-pills nav-justified main-menu text-uppercase text-center">
				<ul class="nav navbar-nav">
					<li><a href="{{route('home')}}">home</a></li>
					<li><a href="{{route('services')}}">service</a></li>
					<li><a href="{{route('pricing')}}">pricing</a></li>
					<li><a href="{{route('gallery')}}">gallery</a></li>
					<li><a href="{{route('blog')}}">blog</a></li>
					<li><a href="{{route('signin')}}">sign in</a></li>
					<li><a href="{{route('signup')}}">sign up</a></li>
					<li><a href="{{route('contact')}}">contact</a></li>
				</ul>
			</div>
		</div>
	</div>
</nav>