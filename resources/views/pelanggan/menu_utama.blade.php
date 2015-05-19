@extends('pelanggan')

@section('content')		
<div id = "content" class="clearfix">
	<div id="utama-title" class="col-xs-10 ">
		@if(Session::has('message'))				
		    <div class="alert {{ Session::get('alert-class') }}">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        {{ Session::get('message') }}
		    </div>
		@endif
		<h4 class="utama-title white"> Menu {{  ucfirst($kategori) }}</h4>
	</div>	
	<div id="content-menu" class="col-sm-10 col-sm-offset-1">	
		@foreach ($list_menu as $menu)	

		<div id="$menu->id_menu" class ="text-center space-bottom col-sm-4 col-xs-12 clear-fix" data-toggle="modal" data-target="#menu-modal"> 
      		{!! HTML::image('storage/app/'.$menu->photoname, 'panggil', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
      		<div class="white">
      			@if($menu->is_rekomendasi == 1)
          			<i class="fa fa-star"></i>
          		@endif
	      		<b>{{$menu->name}}</b>
      		</div>
      	</div>
  		<div class="clearfix visible-xs-block space-bottom"></div>
		
		<!-- Modal Detail -->

		<!--tambahan css baru-->

		<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				
			    <div class="modal-content">
			      	<div class="modal-header">
			        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      	</div>
			      	<div class="modal-body">
			    		{!! HTML::image('storage/app/'.$menu->photoname, $menu->name, array( 'width' => '100%', 'data-toggle' => 'modal'.$menu->id_menu, 'data-target' => '#menu-modal'.$menu->id_menu)) !!}             
				        <div id= "nama-menu" class= "col-xs-12 space">
				        @if($menu->is_rekomendasi == 1)
	          			<i class="fa fa-star"></i>
	          			@endif
				        	<b>{{$menu->name}}</b>
				        </div>

				        @if ($menu->status == 1)	
			        	<div id="status-menu" class= "col-xs-12 text-left">
			        		Tersedia
			        	</div>
						@else
			        	<div id="status-menu" class= "col-xs-12 text-left">
			        		<font color="#bb2828" size="2">Tidak Tersedia</font>
			        	</div>
			        	@endif

				        <div id= "penjelasan-menu" class= "col-xs-12 text-center clearfix space-bottom">
				        	{{ $menu->deskripsi }}
				        </div>

				        <!--ulasan menu-->
				        <div id="rating-layanan1" class="rating rating-layanan col-xs-12">
							<div id="angka-rating1" class="angka-rating">
								<b>{{average($review,$menu->id_menu)}}</b>
							</div>
							<div id="star" class = "star-rating">
								<span class="rating r">1/5</span>
								{{floor(average($review,$menu->id_menu))}}
								<!--RATING
								rating: 0 berarti class = "r0"
								rating: 1 berarti class = "r1"
								rating: 2 berarti class = "r2"
								rating: 3 berarti class = "r3"
								rating: 4 berarti class = "r4"
								rating: 5 berarti class = "r5"-->
							</div>
						</div>
						<!--ulasan menu-->
			      	</div>
			      	<div class="modal-footer">
			      		<div id="harga-menu" class= "harga-menu col-xs-12">
							<?php 
					        		echo "Rp " .str_replace(",",".",number_format($menu->harga, 0)).",-"
					        ?>
						</div>
						 @if ($menu->status == 1)
						<button type="button" class="btn btn-primary col-xs-4 col-xs-offset-8" data-dismiss="modal" data-toggle="modal" data-target="#modal-pesan{{$menu->id_menu}}">Pesan</button>
						@endif
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
						{!! Form::open(array('route' => 'addpemesanan', 'class' => 'form-inline text-center center-block')) !!}	
						<div class= "col-xs-12 clearfix space-bottom text-center">
							Berapa porsi yang Anda ingin pesan?
						</div>
						<!-- <input type="button" class="btn col-xs-1 col-xs-offset-2 text-center add_subs" value=" - "> -->
						<div class="col-xs-6 col-xs-offset-3">
		                    {!! Form::text('porsi', null, 
		                    array('required', 'class'=>'form-control', 'id'=>'porsi'.$menu->id_menu)) !!}
						</div>
						<!-- <input type="button" class="col-xs-1 btn add_subs" value=" + "> -->
						<div class= "space col-xs-12 clearfix space-bottom">
							Apakah Anda memiliki permintaan khusus?
						</div>
						{!! Form::textarea('deskripsi', null, 
                        array('class'=>'form-control','rows'=>5, 'placeholder'=>'Deskripsi Pemesanan (Optional)')) !!}
               			
                   		{!!Form::hidden('id_menu', $menu->id_menu) !!}
                   		{!!Form::hidden('kategori', $kategori) !!}
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
	
<div class="pengisi"></div>

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

<?php

function average($arr, $id)
{
    $count=0;
    $sum = 0;
    for ($i = 0; $i < count($arr); $i++)
    {
    	if($arr[$i]->id_menu==$id){
        	$sum += $arr[$i]->nilai;
        	$count++;
    	}
    }
    if($sum==0) return $sum;
    else return $sum / $count;
}
?>

@endsection