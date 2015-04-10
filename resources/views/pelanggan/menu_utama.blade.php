@extends('pelanggan')

@section('content')		
		<div id = "content" class="clearfix">
			<div id="utama-title" class="col-xs-10 col-xs-offset-1">
		    	{!! HTML::image('assets/img/utama-title.png', 'panggil', array( 'width' => '120px')) !!}              
			</div>	
				
			@foreach ($list_menu as $menu)	
			<div id="content-menu" class="col-sm-10 col-sm-offset-1">

				<div id="$menu->id_menu" class ="col-sm-4 col-xs-12 clear-fix" data-toggle="modal" data-target="#menu-modal"> 
	          		{!! HTML::image('storage/app/'.$menu->photoname, 'panggil', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
	          		{{$menu->name}}
	          	</div>
	      		<div class="clearfix visible-xs-block"></div>
				<div class="clearfix visible-sm-block"></div>			
			</div>
			
			
			<!-- Modal -->
			<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			    	{!! HTML::image('storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%', 'data-toggle' => 'modal'.$menu->id_menu, 'data-target' => '#menu-modal'.$menu->id_menu)) !!}             
			        <div id= "penjelasan-menu" class= "col-xs-8">
			        	<b>{{$menu->name}}</b>
			        </div>
			        
			        <div id= "harga-menu" class= "col-xs-4">
			        	Status
			        </div>

			        @if ($menu->status == 1)	
			        	<div id= "status" class= "col-xs-4">
			        		Tersedia
			        	</div>
					@else
			        	<div id= "status" class= "col-xs-4">
			        		Tidak Tersedia
			        	</div>
		        	@endif

			        <div class="clearfix visible-xs-block"></div>
			        
			        <div id= "harga-menu" class= "col-xs-12">
			        	{{$menu->deskripsi}}
			        </div>
			        
			      </div>
			      <div class="modal-footer">
			      {!! Form::open(array('route' => 'addpemesanan', 'class' => 'form')) !!}
				    <div class="form-group col-xs-4">
	                    <label>Porsi</label>
	                    {!! Form::text('porsi', null, 
	                    array('required', 'class'=>'form-control')) !!}
	                	
	                    {!!Form::hidden('id_menu', $menu->id_menu) !!}

                    	<label>Deskripsi</label>
                     	{!! Form::textarea('deskripsi', null, 
                        array('class'=>'form-control','rows'=>5, 'placeholder'=>'Deskripsi Pemesanan (Optional)')) !!}
               			
               			{!! Form::submit('Pesan', array('class' => 'btn btn-primary')) !!}
               		</div>
			      </div>
			      {!! Form::close() !!}
			    </div>
			  </div>
			</div>
			
			<div id= "footer" class="col-xs-10 col-xs-offset-1">
			    {!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}              
			</div>
			@endforeach
		</div>
@endsection