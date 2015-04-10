@extends('koki')

@section('content')
 <div class="main col-md-10 col-md-offset-2">
	<div class="clearfix visible-xs-block"></div>
 	<div id="kategori" class="judul-home col-md-8">
			Status Menu {{ $kategori }}
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
	  	
	</div>
	<div class="clearfix visible-xs-block"></div>
  	
  	<div id= "isi" class ="col-xs-12 clearfix">
  		<!-- FOREACH DI SINI -->
	  	@foreach ($list_menu as $menu)	

		<div id="$menu->id_menu" class ="col-sm-4 col-xs-12 clear-fix" data-toggle="modal" data-target="#menu-modal"> 
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
		        
			        <div id= "penjelasan" class= "col-xs-10 col-xs-offset-1">
			        	{{$menu->deskripsi}}
			        </div>
			        
			        <div class="col-xs-12 text-center">
						<div id = "btn-status-menu" class="btn-group" data-toggle="buttons">
						 	<label id="btn-not-tersedia" class="btn">
								<input type="radio" name="options" id="wait" autocomplete="off" onselect="{{ URL::to('makeunavailable/'. $menu->id_menu) }}">Tidak Tersedia
						 	</label>
						  	<label id="btn-tersedia" class="btn">
								<input type="radio" name="options" id="done" autocomplete="off" onselect="{{ URL::to('makeavailable/'. $menu->id_menu) }}">Tersedia
						  	</label>
						</div>
						<div class="clearfix visible-xs-block"></div>
						</div>
						
						<div class="clearfix visible-xs-block"></div>
			      	</div>
				    <div class="modal-footer">
				    </div>
			    </div>
			</div>
		</div>
	</div>
	@endforeach
</div>

<script>
	$('#btn-not-tersedia').click(function(){  
	  $(this).css('background-color', '#bb2828');
	  $('#btn-tersedia').css('background-color', '#9f9f9f');
	});


	$('#btn-tersedia').click(function(){  
	  $('#btn-not-tersedia').css('background-color', '#9f9f9f');
	  $(this).css('background-color', 'green');
	});
</script>
@endsection


