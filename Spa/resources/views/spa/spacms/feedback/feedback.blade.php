@extends('spa.spacms.master') 

@push('meta-code')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endpush

@push('script-header')
<script src="spacms/assets/js/jquery-2.2.3.min.js"></script>
@endpush

@section('menu-bar--dashboard')
m-menu__item
@endsection

@section('menu-bar--class-collapse')
m-menu__item  m-menu__item--submenu m-menu__item--open m-menu__item--expanded
@endsection

@section('menu-bar--gallery')
m-menu__item
@endsection

@section('menu-bar--post')
m-menu__item
@endsection

@section('menu-bar--blog')
m-menu__item
@endsection

@section('menu-bar--service')
m-menu__item
@endsection

@section('menu-bar--feedback')
m-menu__item  m-menu__item--active
@endsection

@section('menu-bar--comment')
m-menu__item
@endsection

@section('head-title')
Phản hồi
@endsection

@section('content')

<!-- BEGIN: Subheader -->
@include('spa.spacms.notifications')
<!-- END: Subheader -->
<div class="m-content">
	<div class="m-portlet m-portlet--mobile">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					<h3 class="m-portlet__head-text">
						CHI TIẾT
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<!--begin: Datatable -->
			<table class="table table-bordered m-table">
				<thead>
					<tr>
						<th>
							#
						</th>
						<th>
							Họ tên
						</th>
						<th>
							Email
						</th>
						<th>
							Địa chỉ
						</th>
						<th>
							SDT
						</th>
						<th>
							Phản hồi của khách hàng
						</th>
						<th>
							Thời gian
						</th>

						<th>
							Trả lời
						</th>
					</tr>
				</thead>
				@if(count($feedbacks) > 0) 
				<tbody>
					@foreach($feedbacks as $feedback)
					<tr>
						<th scope="row">
							{{$feedback->id}}
						</th>
						<td>
							{{$feedback['name']}}
						</td>
						<td>
							{{$feedback['email']}}
						</td>
						<td>
							{{$feedback['address']}}
						</td>
						<td>
							{{$feedback['phone']}}
						</td>
						<td>
							{{$feedback['message']}}
						</td>
						<td>
							{{date('M d,Y - h:i:s',strtotime($feedback['created_at']))}}
						</td>
						<td>
							<a href="mailto:{{$feedback['email']}}" class="btn btn-outline-brand m-btn m-btn--icon btn-sm m-btn--icon-only m-btn--pill m-btn--air" data-toggle="m-tooltip" data-placement="top" title="Trả lời">
								<i class="la la-envelope-o"></i>
							</a>
						</td>
					</tr>
					@endforeach
				</tbody>
				@else 
				<tbody>
					<tr>
						<td class="text-center" colspan="8">
							Không có phản hồi nào từ khách hàng	
						</td>
					</tr>
				</tbody>
				@endif
			</table>
			<!--end: Datatable -->
		</div>
	</div>
</div>

<!--End::Main Portlet-->

@endsection

@push('scripts')

<script src="spacms/assets/demo/default/custom/components/datatables/base/html-table.js" type="text/javascript"></script>
@endpush