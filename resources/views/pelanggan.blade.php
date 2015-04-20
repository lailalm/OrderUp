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
		{!! HTML::style('assets/css/font-awesome.min.css') !!}
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
		            		{!! HTML::image('assets/img/panggil.png', 'panggil', array( 'width' => '60px', 'data-toggle' => 'modal', 'data-target' => '#menu-modal-panggil')) !!}              

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
		
		<!-- MODAL DETAIL -->

  		<div class="modal fade" id="menu-modal-panggil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="selected">

		  	<div class="modal-dialog">
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="selected">&times;</span></button>
			      	</div>

			      	<div class="modal-body">
			       		{!! Form::open(array('route' => 'addpemanggilan', 'class' => 'form')) !!}
				        <div id= "nama-menu" class= "col-xs-8 space-bottom">
				        	<b>Apa yang Anda butuhkan?</b> 
				        </div>
				  
			        	 <div class="form-group col-xs-12">
                 			{!! Form::textarea('deskripsi', null, 
                    			array('required', 'class'=>'form-control','rows'=>5, 'placeholder'=>'Masukkan kebutuhan Anda (opsional)')) !!}
           				 </div>
				        <div class = "col-xs-3">
				        	{!!Form::hidden('id_meja', '1') !!}
                			{!! Form::submit('Simpan', array('class' => 'btn btn-primary col-xs-12', 'id' => 'simpan-button')) !!}
                			{!! Form::close() !!}
            			</div>
            		</div>
            		<div class="modal-footer">
            		</div>
			    </div>
			</div>
		</div>

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