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
		<div class="navbar navbar-static navbar-default navbar-fixed-top">
		  <div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle toggle-left hidden-md hidden-lg" data-toggle="sidebar" data-target=".sidebar-left">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			</div>
		  </div>
		</div>

		<div class="container-fluid">
      <div class="row">
        <div id= "sidebar" class="col-xs-5 col-sm-3 col-md-2 sidebar sidebar-left sidebar-animate sidebar-md-show">
          <ul class="nav navbar-stacked">
          	<div id="accordion" class="panel-group">
	        	<div id= "logo-nav" class = "menu-nav cols-xs-12">
	        		<a href="#">
	        			{!! HTML::image('assets/img/logo.png', 'logo-order-up', array( 'width' => '80%')) !!}
	        		</a>
				</div>
				<div data-parent="#accordion" class = "menu-nav cols-xs-12" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
					<li>
						<a href="{{ url('/editprofil')}}">
						{!! HTML::image('assets/img/profil.png', 'karyawan', array( 'width' => '70px')) !!}
					<a href="#">
					</li>
				</div>
				<div class="clearfix visible-xs-block"></div>
	            <div data-parent="#accordion" class = "menu-nav cols-xs-12" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					<li>
					  <a href="{{ url('/daftarpesanan')}}">
	        			{!! HTML::image('assets/img/daftar-pesanan.png', 'menu', array( 'width' => '70px')) !!}
					  </a>
					</li>
	            </div>
	            <div class="clearfix visible-xs-block"></div>

	            <div data-parent="#accordion" class = "menu-nav cols-xs-12" data-toggle="collapse" data-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample1">
		            <li>
		            	<a href="{{ url('/listpemanggilan')}}">
		        			{!! HTML::image('assets/img/panggilan.png', 'karyawan', array( 'width' => '70px')) !!}
		        		<a href="#">
		            </li>
	            </div>
	            <div class="clearfix visible-xs-block"></div>

	            <div class = "menu-nav cols-xs-12">
	            <li>
	              <a href="{{ url('/auth/logout') }}">
	        		{!! HTML::image('assets/img/logout.png', 'karyawan', array( 'width' => '70px')) !!}
	              </a>
	            </li>
	            </div>
	            <div class="clearfix visible-xs-block"></div>

	        </ul>
	        </div>
        </div>
        <div class="container">
        	<div class="col-md-offset-5 text-right judul-role">
	        	Selamat datang, {{ Auth::user()->name }}! Anda masuk sebagai <b>{{ Auth::user()->role}}.</b>
        	</div>
        </div>

        @yield('content')

	</body>
</html>
