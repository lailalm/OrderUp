@extends('pelanggan')

@section('content')	
<div id = "content " class="clearfix">
	<div class="pengisi-atas">
		
	</div>
	<div id= "promo" class = "col-sm-8 col-sm-offset-2">
		{!! HTML::image('assets/img/promosi-title.png', 'panggil', array( 'width' => '120px')) !!}              
		<ul id="slippry-demo">
		  <li>
		    <a href=#>
	    		{!! HTML::image('assets/img/pasta1.jpg', 'Menu Promosi 1', array( 'width' => '200px')) !!}              
		    </a>
		  </li>
		  <li>
		    <a href=#>
	    		{!! HTML::image('assets/img/pizza1.jpg', 'Menu Promosi 2', array( 'width' => '200px')) !!}              
		    </a>
		  </li>
		  <li>
		    <a href=#>
	    		{!! HTML::image('assets/img/spaghetti.jpg', 'Menu Promosi 3', array( 'width' => '200px')) !!}              
		    </a>
		  </li>
		</ul>
	</div>
		
	<div id="content1" class="container">
		<div id= "kategori-main" class="col-sm-8 col-sm-offset-2">
			<div id= "kategori1" class= "col-sm-6 row">
				<div id="btn-kat1" class = "col-xs-4">
					<a href= #>
	    				{!! HTML::image('assets/img/rekomendasi.png', 'Rekomendasi', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat2" class = "col-xs-4">
					<a href= #>
	    				{!! HTML::image('assets/img/pembuka.png', 'Pembuka', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat3" class = "col-xs-4">
					<a href= #>
	    				{!! HTML::image('assets/img/utama.png', 'Utama', array( 'width' => '70px')) !!}              
					</a>
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
			
			<div id= "kategori2" class= "col-sm-6 row">
				<div id="btn-kat4" class = "col-xs-4">
					<a href= #>
	    				{!! HTML::image('assets/img/sampingan.png', 'Sampingan', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat5" class = "col-xs-4">
					<a href= #>
	    				{!! HTML::image('assets/img/penutup.png', 'Penutup', array( 'width' => '70px')) !!}              
					</a>
				</div>
				
				<div id="btn-kat6" class = "col-xs-4">
					<a href= #>
	    				{!! HTML::image('assets/img/minuman.png', 'Minuman', array( 'width' => '70px')) !!}              
					</a>
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
		</div>
	</div>
</div>

<div id= "footer" class="col-xs-12">
    {!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}              
</div>

@endsection
