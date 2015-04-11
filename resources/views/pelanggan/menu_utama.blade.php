@extends('pelanggan')

@section('content')		
<div id = "content" class="clearfix">
	<div id="utama-title" class="col-xs-10 ">
		<h4 class="utama-title white"> Menu {{  ucfirst($kategori) }}</h4>
	</div>	
	<div id="content-menu" class="col-sm-10 col-sm-offset-1">	
		@foreach ($list_menu as $menu)	

		<div id="$menu->id_menu" class ="text-center space-bottom col-sm-4 col-xs-12 clear-fix" data-toggle="modal" data-target="#menu-modal"> 
      		{!! HTML::image('storage/app/'.$menu->photoname, 'panggil', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
      		<div class="white">
	      		<b>{{$menu->name}}</b>
      		</div>
      	</div>
  		<div class="clearfix visible-xs-block space-bottom"></div>
		
		<!-- Modal Detail -->
		<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				{!! Form::open(array('route' => 'addpemesanan', 'class' => 'form-inline text-center center-block')) !!}
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
			      	<div class="modal-body">
			    		{!! HTML::image('storage/app/'.$menu->photoname, $menu->name, array( 'width' => '100%', 'data-toggle' => 'modal'.$menu->id_menu, 'data-target' => '#menu-modal'.$menu->id_menu)) !!}             
				        <div id= "nama-menu" class= "col-xs-8 space">
				        	<b>{{$menu->name}}</b>
				        </div>

				        @if ($menu->status == 1)	
			        	<div id="status-menu" class= "col-xs-4">
			        		Tersedia
			        	</div>
						@else
			        	<div id="status-menu" class= "col-xs-4">
			        		Tidak Tersedia
			        	</div>
			        	@endif

				        <div id= "penjelasan-menu" class= "col-xs-12 text-center clearfix space-bottom">
				        	{{ $menu->deskripsi }}
				        </div>
			      	</div>
			      	<div class="modal-footer">
			      		<div id="harga" class= "harga-menu col-xs-9">
							<?php 
					        		echo "Rp " .str_replace(",",".",number_format($menu->harga, 0)).",-"
					        ?>
						</div>
						<button type="button" class="btn btn-primary col-xs-3" data-dismiss="modal" data-toggle="modal" data-target="#modal-pesan{{$menu->id_menu}}">Pesan</button>
			      	</div>
			    </div>
			</div>
		</div>
		<!-- Modal Add Pesan -->
		<div class="modal fade" id="modal-pesan{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<div class="text-center col-xs-12">
							<h4>{{ $menu->name }}</h4>
						</div>
					</div>
					<div class="modal-body">
						<input id="satuan{{$menu->id_menu}}" style="display:none;" value="{{ $menu->harga }}">
							
						<div class= "col-xs-12 clearfix space-bottom text-center">
							Berapa porsi yang Anda ingin pesan?
						</div>
						<input type="button" class="btn col-xs-1 col-xs-offset-2 text-center add_subs" value=" - ">
						<div class="col-xs-6">
		                    {!! Form::text('porsi', null, 
		                    array('required', 'class'=>'form-control', 'id'=>'porsi'.$menu->id_menu)) !!}
						</div>
						<input type="button" class="col-xs-1 btn add_subs" value=" + ">
						<div class= "space col-xs-12 clearfix space-bottom">
							Apakah Anda memiliki permintaan khusus?
						</div>
						{!! Form::textarea('deskripsi', null, 
                        array('class'=>'form-control','rows'=>5, 'placeholder'=>'Deskripsi Pemesanan (Optional)')) !!}
               			
                   		{!!Form::hidden('id_menu', $menu->id_menu) !!}
	                    <div class="col-xs-10 col-xs-offset-1">
							<div class="col-xs-12 harga-menu space">
								Total 
							</div>
							<div id="harga-total{{$menu->id_menu}}" class="col-xs-12 harga-menu space-bottom">
								<?php 
					        		echo "Rp " .str_replace(",",".",number_format($menu->harga, 0)).",-"
					        	?>
							</div>
							<button data-dismiss="modal" class="btn btn-primary col-xs-4 col-xs-offset-2"> Cancel</button>
               				{!! Form::submit('Pesan', array('class' => 'btn btn-primary col-xs-4 col-xs-offset-1')) !!}							
						</div>
               		</div>
               		<div class="modal-footer row"></div>
				</div>
				<script type="text/javascript">
					$('#porsi{{$menu->id_menu}}').val('1');

					$('#porsi{{$menu->id_menu}}').change(function perkalian(){
						var total = $('#satuan{{$menu->id_menu}}').val() * $('#porsi{{$menu->id_menu}}').val();
						$('#harga-total{{$menu->id_menu}}').text(formatRp(total));
					});
				</script>
			    {!! Form::close() !!}
			</div>
		</div>
		@endforeach
	</div>
</div>
	

<div id= "footer" class="col-xs-12">
	<a href="{{ url('/') }}">
    	{!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}              
    </a>
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