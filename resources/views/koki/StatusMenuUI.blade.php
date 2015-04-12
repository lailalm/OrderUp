@extends('koki')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<div id="kategori" class="judul-home col-md-8">
			Status Menu {{ ucfirst($kategori) }}
			</div>
			<select 
				class="selectpicker col-md-4 space" 
				onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<option value="utama" {{ $kategori === 'utama' ? 'selected' : '' }}> Menu Utama</option>
				<option value="promosi" {{ $kategori == 'promosi' ? 'selected' : ''}}> Menu Promosi</option>
				<option value="rekomendasi" {{ $kategori == 'rekomendasi' ? 'selected' : ''}}> Menu Rekomendasi</option>
				<option value="pembuka" {{ $kategori == 'pembuka' ? 'selected' : ''}}> Menu Pembuka</option>
				<option value="sampingan" {{ $kategori == 'sampingan' ? 'selected' : ''}}> Menu Sampingan</option>
				<option value="minuman" {{ $kategori == 'minuman' ? 'selected' : ''}}> Menu Minuman</option>
			</select>
			<div id= "isi" class ="col-xs-12 clearfix">
	        
			@if (count($list_menu) <= 0)
				<h5 class="judul-role">
					Belum ada menu {{ $kategori }} terdaftar.
				</h5>	
			@endif
			
	  		<!-- FOREACH DI SINI -->
		  	@foreach ($list_menu as $menu)	

			<div id="menu1" class ="col-sm-4 col-xs-12 clear-fix" data-toggle="modal" data-target="#menu-modal"> 
	      		{!! HTML::image('storage/app/'.$menu->photoname, 'panggil', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
	      		{{$menu->name}}
	      	</div>
	  				
	  		<div class="clearfix visible-xs-block"></div>

	  		<!--Ganti Status Modal-->
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
			        	<div class="clearfix visible-xs-block"></div>
			        
				        <div id= "penjelasan" class= "space-bottom col-xs-10 col-xs-offset-1">
				        	{{$menu->deskripsi}}
				        </div>
				        
				        <div class="col-xs-12 text-center">
							<div class="btn-group col-xs-12">
								@if($menu->status == 0)
								 	<a href="{{ URL::to('makeunavailable/'. $menu->id_menu) }}" class="btn btn-primary col-sm-6">
										Tidak Tersedia
								 	</a>
								  	<a href="{{ URL::to('makeavailable/'. $menu->id_menu) }}" class="btn abu col-sm-6">
										Tersedia
									</a>
								@else
									<a href="{{ URL::to('makeunavailable/'. $menu->id_menu) }}" class="btn abu col-sm-6">
										Tidak Tersedia
								 	</a>
								  	<a href="{{ URL::to('makeavailable/'. $menu->id_menu) }}"  class="btn btn-success col-sm-6">
										Tersedia
									</a>
								@endif
							</div>							
				      	</div>
					    <div class="modal-footer">
					    </div>
				    </div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</div>
@endsection


