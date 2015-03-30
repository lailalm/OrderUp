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
		{!! HTML::style('assets/css/stylePelanggan.css') !!}
		@section('css')
		

		@section('head-js')
		@show		
		{!! HTML::script('assets/js/jquery-1.11.2.min.js'); !!}
		{!! HTML::script('assets/js/jquery-migrate-1.2.1.min.js'); !!}
		{!! HTML::script('assets/js/bootstrap.min.js'); !!}			
	</head>
	
	<body>
			<div id = "main" class="col-md-6 col-md-offset-3"> 
				<div id ="logo">
					{!! HTML::image('assets/img/logo.png', 'logo-order-up', array( 'width' => '90%')) !!}
				</div>
				
				<div id= "text-content" class='container-fluid'>
					<h4>Selamat Datang</h4>
					<hr width="80%">
					Silahkan masukkan kode log in yang sudah diberikan oleh pelayan kami
				</div>
				<div id= "login" class ='col-md-8 col-md-offset-2'>
					<form id= "formIn" method= "post">
						<input id= "kode-in" type="text" required placeholder="Kode Login">
						<button id= "btn-in" class= "btn">Log In</button>
					</form>
				</div>
			</div>
	</body>
</html>



 

