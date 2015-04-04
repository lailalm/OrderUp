@extends('manajer')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11 col-md-offset-1">
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
	          <div id= "isi" class ="col-xs-12 clearfix">
				@foreach ($list_menu as $menu)
	          	<div id="menu1" class ="col-sm-4 col-xs-12 clear-fix"> 
	          		{!! HTML::image('../storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
	          		{{$menu->name}}
	          	</div>
	      		<div class="clearfix visible-xs-block"></div>

	      		<!-- MODAL DETAIL -->
	      		<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  	<div class="modal-dialog">
					    <div class="modal-content">
					      	<div class="modal-header">
					        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					      	</div>
					      	<div class="modal-body">
					        	{!! HTML::image('../storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%', 'data-toggle' => 'modal'.$menu->id_menu, 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
						    <div class="modal-body">
				       
					        <div id= "nama-menu" class= "col-xs-8">
					        	<b>{{$menu->name}}</b>
					        </div>
					  
				        	@if ($menu->status === 1)	
					        	<div id= "status" class= "col-xs-4">
					        		Tersedia
					        	</div>
							@else
					        	<div id= "status" class= "col-xs-4">
					        		Tidak Tersedia
					        	</div>
				        	@endif
					        
					        <div class="clearfix visible-xs-block"></div>
					        
					        <div id= "penjelasan" class= "col-xs-10 col-xs-offset-1">
					        	{{$menu->deskripsi}}
					        </div>
					        
					        <div id = "harga-menu" class = "col-xs-12">
					        	<?php 
					        		echo "Rp " .str_replace(",",".",number_format($menu->harga, 0)).",-"
					        	?>
					        </div>
					        
					      </div>
					      <div class="modal-footer">
					      	<div id="footer-modal-menu" class =" col-xs-12">
								<a href= "#"><div class = "col-xs-5 col-xs-offset-3">
									Rekomen
								</div></a>
						
								<a href="{{ URL::to('editmenu/'. $menu->id_menu) }}"><div class = "col-xs-2">
									Edit
								</div></a>
						
								<a href="#" data-dismiss="modal" data-toggle="modal" data-target="#confirm-delete-modal{{$menu->id_menu}}"><div class = "col-xs-2">
									Hapus
								</div></a>
								<div class="clearfix visible-xs-block"></div>
							</div>
					      </div>
					    </div>
					  </div>
					</div>
				</div>
				<!-- MODAL CONFIRM DELETE -->
				<div class="modal fade" id="confirm-delete-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  		<div class="modal-dialog">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				      		</div>
					      	<div class="modal-body">
						      	<div id= "delete-ques" class ="col-xs-12">
						      		Apakah Anda yakin ingin menghapus menu <b>{{$menu->name}}</b>?
						      	</div>
					      	</div>
					      
					      	<div class="modal-footer">
					      		<div id="footer-modal-menu" class =" col-xs-12">
									<div class = "col-xs-3 col-xs-offset-3">
										<button data-dismiss="modal" id="batal-button" class="btn button col-xs-12">
											Batal
										</button>
									</div>
						
									<div class = "col-xs-3">
										<a href="{{ URL::to('deletemenu/' . $menu->id_menu) }}" id="hapus-button" class="btn button col-xs-12">
											Hapus
										</a>
									</div>
									<div class="clearfix visible-xs-block"></div>
									<div class="clearfix visible-xs-block"></div>
								</div>
					      	</div>
					    </div>
					</div>
				</div>

		    	@endforeach
	    </div>
	</div>
</div>
<script type="text/javascript">
	function formatRp(num) {
	    var p = num.toFixed(2).split(".");
	    return "Rp " + p[0].split("").reverse().reduce(function(acc, num, i, orig) {
	        return  num + (i && !(i % 3) ? "." : "") + acc;
	    }, "") + "," + p[1];
	}
</script>
@endsection
