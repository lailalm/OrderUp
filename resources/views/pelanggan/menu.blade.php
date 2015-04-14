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
		@if (Auth::guest())
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
				<img src= "assets/img/logo.png" width= 90%> 
			</div>
			
			<div id= "text-content" class='container-fluid'>
				<h4>Selamat Datang</h4>
				<hr width = 80%>
				Silahkan masukkan kode log in yang sudah diberikan oleh pelayan kami
			</div>
			<div id= "login" class ='col-sm-8 col-sm-offset-2'>
				<form id= "formIn" class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<input id= "isKaryawan" type="hidden" class="form-control" name="isKaryawan" value="false">
					<input id= "kode-in" type="text" required placeholder="Kode Login"
						class="form-control" name="email">
					<input style="display:none" id="password" type="password" 
						required placeholder="Password" class="form-control" name="password">

					<div id="btnIn" class = "col-xs-12"><button onclick="setpwd()"
					type="submit" id= "btn-in" class= "btn">Log In</button></div>
					<script type="text/javascript">
						function setpwd()
						{
							$('#password').val($('#kode-in').val());
						}
					</script>
				</form>
			</div>
		</div>
		@else
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

<!-- CONTENT -->
<div id = "content " class="clearfix">
	<div class="pengisi-atas">
		
	</div>
	<div id= "promo" class = "col-sm-8 col-sm-offset-2">
		{!! HTML::image('assets/img/promosi-title.png', 'panggil', array( 'width' => '120px')) !!}              
		<ul id="slippry-demo">
		@foreach ($menu_promosi as $menu)
			<li>
			    <a href="{{ url('menu/promosi')}}">
			    	{!! HTML::image('storage/app/'.$menu->photoname, $menu->name, array('width' => '200px', 'height' => '500px')) !!}
			    </a>
			</li>
		@endforeach
		</ul>
	</div>
		
	<div id="content1" class="container">
		<div id= "kategori-main" class="col-sm-8 col-sm-offset-2">
			<div id= "kategori1" class= "col-sm-6 row">
				<div id="btn-kat1" class = "col-xs-4">
					<a href= "{{ url('menu/rekomendasi')}}">
	    				{!! HTML::image('assets/img/rekomendasi.png', 'Rekomendasi', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat2" class = "col-xs-4">
					<a href= "{{ url('menu/pembuka')}}">
	    				{!! HTML::image('assets/img/pembuka.png', 'Pembuka', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat3" class = "col-xs-4">
					<a href= "{{ URL::to('menu/utama') }}">
	    				{!! HTML::image('assets/img/utama.png', 'Utama', array( 'width' => '70px')) !!}              
					</a>
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
			
			<div id= "kategori2" class= "col-sm-6 row">
				<div id="btn-kat4" class = "col-xs-4">
					<a href= "{{ url('menu/sampingan')}}">
	    				{!! HTML::image('assets/img/sampingan.png', 'Sampingan', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat5" class = "col-xs-4">
					<a href= "{{ url('menu/penutup')}}">
	    				{!! HTML::image('assets/img/penutup.png', 'Penutup', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat6" class = "col-xs-4">
					<a href= "{{ url('menu/minuman')}}">
	    				{!! HTML::image('assets/img/minuman.png', 'Minuman', array( 'width' => '70px')) !!}              
					</a>
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
		</div>
	</div>
</div>

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
		@endif
	</body>
</html>
