@extends('pelanggan')

@section('content')		
		<div id = "content" class="clearfix">
			<div id="utama-title" class="col-xs-10 col-xs-offset-1">
		    	{!! HTML::image('assets/img/utama-title.png', 'panggil', array( 'width' => '120px')) !!}              
			</div>	
				
			<div id="content-menu" class="col-sm-10 col-sm-offset-1">	
				<div id= "menu1" class="col-sm-4 col-xs-12" data-toggle="modal" data-target="#menu-modal">
		    		{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
					Menu Utama 1
				</div>
				<div class="clearfix visible-xs-block"></div>
				
				<div id= "menu2" class="col-sm-4 col-xs-12">
		    		{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
					Menu Utama 2
				</div>
				<div class="clearfix visible-xs-block"></div>
				
				<div id= "menu3" class="col-sm-4 col-xs-12">
		    		{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
					Menu Utama 3
				</div>
				<div class="clearfix visible-xs-block"></div>
				<div class="clearfix visible-sm-block"></div>
				
				<div id= "menu4" class="col-sm-4 col-xs-12">
		    		{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
					Menu Utama 4
				</div>	
				<div class="clearfix visible-xs-block"></div>
							
				<div id= "menu5" class="col-sm-4 col-xs-12">
		    		{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
					Menu Utama 5
				</div>
				<div class="clearfix visible-xs-block"></div>
				
				<div id= "menu6" class="col-sm-4 col-xs-12">
		    		{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
					Menu Utama 6
				</div>
				<div class="clearfix visible-xs-block"></div>
				<div class="clearfix visible-sm-block"></div>			
			</div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      </div>
		      <div class="modal-body">
		    	{!! HTML::image('assets/img/menu-utama.jpg', 'panggil', array( 'width' => '100%')) !!}              
		        <div id= "penjelasan-menu" class= "col-xs-8">
		        	Menu Utama 1
		        </div>
		        
		         <div id= "harga-menu" class= "col-xs-4">
		        	Status
		        </div>
		        <div class="clearfix visible-xs-block"></div>
		        
		        <div id= "harga-menu" class= "col-xs-12">
		        	Penjelasan singkat
		        </div>
		        
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-primary">Pesan</button>
		      </div>
		    </div>
		  </div>
		</div>
		
		<div id= "footer" class="col-xs-10 col-xs-offset-1">
		    {!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}              
		</div>
@endsection