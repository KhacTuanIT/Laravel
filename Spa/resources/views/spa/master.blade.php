<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<title>@yield('title')</title>
		<base href="{{asset('source/spa/./')}}">
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="assets/css/box-effect.css">
		<link rel="stylesheet" type="text/css" href="assets/css/button-effect.css">
		<link rel="stylesheet" type="text/css" href="assets/css/libs/animate.css">
		<link rel="stylesheet" type="text/css" href="assets/dist/assets/owl.carousel.min.css">
		<link rel="stylesheet" type="text/css" href="assets/dist/assets/owl.theme.default.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
		<script type="text/javascript" src="assets/js/jquery-2.2.3.min.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</head>
	<body>
		
		@include('spa.header')
		
		@yield('content')

		@include('spa.footer')

		@stack('script')
	</body>
</html>