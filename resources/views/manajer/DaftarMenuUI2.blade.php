@extends('manajer')
	<div class="main col-md-10 col-md-offset-2">
          
          <div class ="col-md-3 col-md-offset-9 col-xs-10 col-xs-offset-1">
          	
          	<select class="selectpicker" data-header="Kategori Menu">
			  <option>Menu Promosi</option>
			  <option>Menu Rekomendasi</option>
			  <option>Menu Pembuka</option>
			  <option>Menu Utama</option>
			  <option>Menu Sampingan</option>
			  <option>Menu Penutup</option>
			  <option>Menu Minuman</option>
			</select>
			
			<script>
				$('.selectpicker').selectpicker();
			</script>
          	
          </div>
          <div class="clearfix visible-xs-block"></div>
          
          <div id= "isi" class ="col-xs-12 clearfix">
	          @foreach ($list_menu as $menu)
	          	<div id="menu1" class ="col-sm-4 col-xs-12"> 
	          		{!! HTML::image('assets/img/menu-utama.jpg', 'logo-order-up', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal')) !!}
	          		{{$menu->name}}
	          	</div>
          		<div class="clearfix visible-xs-block"></div>

	          @endforeach

          	
          	
          </div>
          
          <div class="modal fade" id="menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      </div>
		      <div class="modal-body">
		       
		        {!! HTML::image('assets/img/menu-utama.jpg', 'logo-order-up', array( 'width' => '100%')) !!}

		        <div id= "nama-menu" class= "col-xs-8">
		        	Fettuccine Carbonara
		        </div>
		        
		         <div id= "status" class= "col-xs-4">
		        	Tersedia
		        </div>
		        <div class="clearfix visible-xs-block"></div>
		        
		        <div id= "penjelasan" class= "col-xs-10 col-xs-offset-1">
		        	Pasta homemade dengan daging asap dan saus krim gurih, ditaburi dengan keju parmesan.
		        </div>
		        
		        <div id = "harga-menu" class = "col-xs-12">
		        	Rp 35.000
		        </div>
		        
		      </div>
		      <div class="modal-footer">
		      	<div id="footer-modal-menu" class =" col-xs-12">
					<a href= "#"><div class = "col-xs-5 col-xs-offset-3">
						Rekomen
					</div></a>
			
					<a href= "#"><div class = "col-xs-2">
						Edit
					</div></a>
			
					<a href= "#"><div class = "col-xs-2">
						Hapus
					</div></a>
					<div class="clearfix visible-xs-block"></div>
				</div>
		      </div>
		    </div>
		  </div>
		</div>
		
		<!--Create Menu Modal-->
		<div class="modal fade" id="create-menu-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      </div>
		      <div class="modal-body">
		        <div id= "nama-menu" class= "col-xs-8">
		        	Fettuccine Carbonara
		        </div>
		        
		         <div id= "status" class= "col-xs-4">
		        	Tersedia
		        </div>
		        <div class="clearfix visible-xs-block"></div>
		        
		        <div id= "penjelasan" class= "col-xs-10 col-xs-offset-1">
		        	Pasta homemade dengan daging asap dan saus krim gurih, ditaburi dengan keju parmesan.
		        </div>
		        
		        <div id = "harga-menu" class = "col-xs-12">
		        	Rp 35.000
		        </div>
		        
		        <div id = "picture" class = "col-xs-12">
		        	<input id="menu-pic" type="file" class="file">
		        </div>
		            
		      </div>
		      <div class="modal-footer">
		      	<div id="footer-modal-menu" class =" col-xs-12">
					<a href= "#"><div class = "col-xs-5 col-xs-offset-3">
						Rekomen
					</div></a>
			
					<a href= "#"><div class = "col-xs-2">
						Edit
					</div></a>
			
					<a href= "#"><div class = "col-xs-2">
						Hapus
					</div></a>
					<div class="clearfix visible-xs-block"></div>
				</div>
		      </div>
		    </div>
		  </div>
		</div>