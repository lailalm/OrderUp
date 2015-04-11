@extends('pelanggan')

@section('content')	
<div id = "content " class="clearfix">
	<div class="pengisi-atas">
		
	</div>
	<div id= "promo" class = "col-sm-8 col-sm-offset-2">
		{!! HTML::image('assets/img/promosi-title.png', 'panggil', array( 'width' => '120px')) !!}              
		<ul id="slippry-demo">
		@foreach ($menu_promosi as $menu)
			<li>
			    <a href="{{ url('menua/promosi')}}">
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

@endsection
