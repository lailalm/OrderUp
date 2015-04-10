@extends('koki')

@section('content')
 <div class="main col-md-10 col-md-offset-2">
	<div class="clearfix visible-xs-block"></div>
 	<label class="judul-home col-md-8 col-xs-1 space">Status Menu</label>
  	<div class ="col-md-3 col-xs-9 space">
	  	<select class="selectpicker" data-header="Kategori Menu">
		  <option>Menu Promosi</option>
		  <option>Menu Rekomendasi</option>
		  <option>Menu Pembuka</option>
		  <option>Menu Utama</option>
		  <option>Menu Sampingan</option>
		  <option>Menu Penutup</option>
		  <option>Menu Minuman</option>
		</select>
	  	
	</div>
	<div class="clearfix visible-xs-block"></div>
  	
  	<div id= "isi" class ="col-xs-12 clearfix">
  		<!-- FOREACH DI SINI -->
	  	<div id="menu1" class ="col-sm-4 col-xs-12"> 
	  		<img src= "assets/img/menu-utama.jpg" data-toggle="modal" data-target="#status-menu-modal" width= 100%>
	  		Menu Utama 1
	  	</div>
  		<div class="clearfix visible-xs-block"></div>

  		<!--Ganti Status Modal-->
		<div class="modal fade" id="status-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  	<div class="modal-dialog">
		    	<div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
			    <div class="modal-body">   
		        	<img src= "assets/img/menu-utama.jpg" width= 100%>
		        	<div id= "nama-menu" class= "col-xs-12">
		        		<b>Fettuccine Carbonara</b>
		        	</div>
		        	<div class="clearfix visible-xs-block"></div>
		        
			        <div id= "penjelasan" class= "col-xs-10 col-xs-offset-1">
			        	Pasta homemade dengan daging asap dan saus krim gurih, ditaburi dengan keju parmesan.
			        </div>
			        
			        <div class="col-xs-12 text-center">
						<div id = "btn-status-menu" class="btn-group" data-toggle="buttons">
						 	<label id="btn-not-tersedia" class="btn">
								<input type="radio" name="options" id="wait" autocomplete="off">Tidak Tersedia
						 	</label>
						  	<label id="btn-tersedia" class="btn">
								<input type="radio" name="options" id="done" autocomplete="off">Tersedia
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
	<!-- ENDFOREACH -->
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


