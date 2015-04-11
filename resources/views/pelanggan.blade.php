<!DOCTYPE html>
<html>
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
		{!! HTML::style('assets/css/slippry.css') !!}
		@section('css')
		

		@section('head-js')
		@show		
		{!! HTML::script('assets/js/jquery-1.11.2.min.js'); !!}
		{!! HTML::script('assets/js/jquery-migrate-1.2.1.min.js'); !!}
		{!! HTML::script('assets/js/bootstrap.min.js'); !!}
		{!! HTML::script('assets/js/slippry.min.js'); !!}	


	</head>
	
	<body>
		<div id="nav" class="container">
		    <nav class="navbar navbar-default navbar-general">
		        <div class="container-fluid">
		            <div class="navbar-header">
		                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bar">
		                    <span class="sr-only">Toggle Navigation</span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                    <span class="icon-bar"></span>
		                </button>
		                <div class = 'navbar-logo'>
		                	<a  href=#>
		                		{!! HTML::image('assets/img/logo.png', 'logo-order-up', array( 'width' => '120px')) !!}
		                	</a>
		                </div>
		            	<div id = "right" class="nav navbar-nav navbar-right">     
		            		{!! HTML::image('assets/img/panggil.png', 'panggil', array( 'width' => '60px')) !!}              
		                </div>
		            </div>
		
		            <div class="collapse navbar-collapse" id="bar">
		                <ul class="nav navbar-nav">
		                    <li><a href="{{ url('/listpesanan')}}">Lihat Daftar Pesanan</a></li>
		                    <li><a href="{{ url('/pembayaran')}}">Pembayaran</a></li>
		                    <li><a href="{{ url('/tutorial')}}">Cara Penggunaan</a></li>
		                </ul>
		            </div>
		        </div>
		    </nav>
		</div>
		
		@yield('content')
		

		<script>
			$(document).ready(
				function(){
					$('#slippry-demo').slippry({
						adaptiveHeight: false
					});
				}
			);
		</script>
	</body>
</html>