<!DOCTYPE html>
<html lang = "en">
	<head>	
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		@section('description')
		<meta name="description" content="" />
		@show
		<meta name="author" content="PPLA05" />
		
		@section('title')
		<title>Order Up!</title>
		@show
		
		{!! HTML::style('assets/css/bootstrap.min.css') !!}
		{!! HTML::style('assets/css/bootstrap-theme.min.cs') !!} 
		{!! HTML::style('assets/css/style.css') !!}
		{!! HTML::style('assets/css/styleKaryawan.css') !!}
		{!! HTML::style('assets/css/sidebar.css') !!}
		{!! HTML::style('assets/css/bootstrap-select.min.css') !!}
		{!! HTML::style('assets/css/fileinput.min.css') !!}
		@section('css')
		
		@section('head-js')
		@show		
		{!! HTML::script('assets/js/jquery-1.11.2.min.js'); !!}
		{!! HTML::script('assets/js/jquery-migrate-1.2.1.min.js'); !!}
		{!! HTML::script('assets/js/bootstrap.min.js'); !!}	
		{!! HTML::script('assets/js/sidebar.js'); !!}	
		{!! HTML::script('assets/js/bootstrap-select.min.js'); !!}	
		{!! HTML::script('assets/js/fileinput.min.js'); !!}	
		
	</head>
	
	<body>
	

	@yield('content')

	<!-- Scripts -->
	
</body>
</html>
