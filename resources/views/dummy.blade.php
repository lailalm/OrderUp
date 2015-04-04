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
				<div id ="logo">
					{!! HTML::image('storage/img/logo.png', 'logo-order-up', array( 'width' => '90%')) !!}
				</div>
				
				<div id= "login" class ='col-sm-8 col-sm-offset-2'>
					<form id= "formIn" method= "post">
						<input id= "email-in" type="email" required placeholder="Email">
						<input id= "password" type="password" required placeholder="Password">
						<a href id ="forgot-password"> <em>Forgot password</em></a>
						<button id= "btn-in" class= "btn">Log In</button>
					</form>
				</div>
			</div>
	</body>
</html>



 
