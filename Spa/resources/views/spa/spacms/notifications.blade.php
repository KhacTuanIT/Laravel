

@if(session('success'))

<div class="m-alert m-alert--icon m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
	<div class="m-alert__icon">
		<i class="la la-warning"></i>
	</div>
	<div class="m-alert__text">
		<span>{{session('success')}}</span>
	</div>
	<div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
</div>

@endif

@if(count($errors) > 0)

<div class="m-alert m-alert--icon m-alert--outline alert alert-danger alert-dismissible fade show" role="alert" >
	<div class="m-alert__icon">
		<i class="la la-warning"></i>
	</div>
	<div class="m-alert__text">
		<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
		</ul>
	</div>
	<div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
</div>

@endif