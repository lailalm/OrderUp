
<!DOCTYPE html>
<html lang = "en">
	<head>	
 		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		@section('description')
		<meta name="description" content="" />
		@show
		<meta name="author" content="PPLA05" />
		
		@section('title')
		<title>Order Up!</title>
		@show

		{!! HTML::style('assets/css/bootstrap.min.css') !!}
		{!! HTML::style('assets/css/bootstrap-theme.min.cs') !!} 
		{!! HTML::style('assets/css/styleKaryawan.css') !!}
		@section('css')
		

		@section('head-js')
		@show		
		{!! HTML::script('assets/js/jquery-1.11.2.min.js'); !!}
		{!! HTML::script('assets/js/jquery-migrate-1.2.1.min.js'); !!}
		{!! HTML::script('assets/js/bootstrap.min.js'); !!}				
	</head>	
	
	<body>
		<div id = "main" class="col-sm-6 col-sm-offset-3"> 
			@if (count($errors) > 0)
				<div class="alert alert-danger">
    				<a href="#" class="close" data-dismiss="alert">&times;</a>
					<strong>Whoops!</strong><br>
					<ul>
						@foreach ($errors->all() as $error)
							{{ $error }}<br>
						@endforeach
					</ul>
				</div>
			@endif
			<div id ="logo">
				{!! HTML::image('assets/img/logo.png', 'logo-order-up', array( 'width' => '90%')) !!}
			</div>
			
			<div id= "login" class ='col-sm-8 col-sm-offset-2 clearfix'>
				<form id= "formIn" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input id= "isKaryawan" type="hidden" class="form-control" name="isKaryawan" value="true">
				<input id= "email-in" type="email" required placeholder="Email" class="form-control" name="email" value="{{ old('email') }}">
				<input id= "password" type="password" required placeholder="Password" class="form-control" name="password">

				<div class="col-xs-12">
					<div id = "remember-me" class ="col-sm-6 col-xs-12">
						<input id="check" type="checkbox" value="remember" name="remember"><a href = "#" id="remember">Remember me</a>
					</div>
					
					<div id = "forgot-password" class="col-sm-6 col-xs-12">
						<a href="{{ url('/password/email') }}">Lupa kode log in</a>
					</div>
					<div class="clearfix visible-xs-block"></div>
				</div>
				<div class="clearfix visible-xs-block"></div>

				<div id="btnIn" class = "col-xs-12"><button type="submit" id= "btn-in" class= "btn">Log In</button></div>
			</form>
			</div>
		</div>
	</body>
</html>
