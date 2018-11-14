<!-- Success notification -->
@if(session('success_message'))
<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-success alert-dismissible fade show" role="alert">
	<div class="m-alert__icon">
		<i class="fa fa-check"></i>
		<span></span>
	</div>
	<div class="m-alert__text">
    	{{session('success_message')}}
	</div>
	<div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
</div>

@endif


<!-- //Errors notifications -->
@if(count($errors)>0)
<div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-danger alert-dismissible fade show" role="alert">
	<div class="m-alert__icon">
		<i class="fa fa-warning"></i>
		<span></span>
	</div>
	<div class="m-alert__text">
		<strong>
			Không thành công !! <br>
		</strong>
       @if(session('errors_message'))
       <span>{{session('errors_message')}}</span>
       @endif
        @foreach($errors->all() as $error)
            {{$error}}. </br>
        @endforeach
	</div>
	<div class="m-alert__close">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
	</div>
</div>
@endif