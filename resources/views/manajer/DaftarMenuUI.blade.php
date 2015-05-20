@extends('manajer')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<div id="kategori" class="judul-home col-md-8">
			Menu {{ ucfirst($kategori) }}
			</div>
			<select
				class="selectpicker col-md-4 space"
				onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
				<option value="utama" {{ $kategori === 'utama' ? 'selected' : '' }}> Menu Utama</option>
				<option value="promosi" {{ $kategori == 'promosi' ? 'selected' : ''}}> Menu Promosi</option>
				<option value="rekomendasi" {{ $kategori == 'rekomendasi' ? 'selected' : ''}}> Menu Rekomendasi</option>
				<option value="pembuka" {{ $kategori == 'pembuka' ? 'selected' : ''}}> Menu Pembuka</option>
				<option value="sampingan" {{ $kategori == 'sampingan' ? 'selected' : ''}}> Menu Sampingan</option>
				<option value="penutup" {{ $kategori == 'penutup' ? 'selected' : ''}}> Menu Penutup</option>
				<option value="minuman" {{ $kategori == 'minuman' ? 'selected' : ''}}> Menu Minuman</option>
			</select>
			<div id= "isi" class ="col-xs-12 clearfix">

			@foreach ($errors->all() as $error)
            <div class="alert alert-success">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    <li>{{ $error }}</li>
                </ul>
            </div>
            @endforeach

	        @if(Session::has('message'))
			    <div class="alert {{ Session::get('alert-class') }}">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        {{ Session::get('message') }}
			    </div>
			@endif

			@if (count($list_menu) <= 0)
				<h5 class="judul-role">
					Belum ada menu {{ $kategori }} terdaftar.
				</h5>
			@endif

			@foreach ($list_menu as $menu)

	          	<div id="menu1" class ="col-sm-4 col-xs-12 clear-fix">
	          		{!! HTML::image('storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
	          		@if($menu->is_rekomendasi == 1)
	          			<i class="fa fa-star"></i>
	          		@endif
	          			{{$menu->name}}
	          	</div>
	      		<div class="clearfix visible-xs-block"></div>

	      		<!-- MODAL DETAIL -->
	      		<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="selected">
				  	<div class="modal-dialog">
					    <div class="modal-content">
					      	<div class="modal-header">
					        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="selected">&times;</span></button>
					      	</div>
					      	<div class="modal-body">
					        	{!! HTML::image('storage/app/'.$menu->photoname, 'lala', array('class' => 'lihat-foto', 'width' => '60%', 'data-toggle' => 'modal'.$menu->id_menu, 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
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

							<div id = "harga-menu" class = "col-xs-5">
					        	<?php
					        		echo "Rp " .str_replace(",",".",number_format($menu->harga, 0)).",-"
					        	?>
					        </div>
					        @if ($menu->is_promosi === 1)
					        <div class="col-xs-7 text-right space">
					        	<p>Tanggal berakhir promosi : {{ $menu->end_date_promosi }}</p>
					        </div>
					        @endif
					        <!-- TO-DO -->
					        <div id = "judul-ulasan" class = "col-xs-12">
					        	Ulasan
					        </div>

					        <div id="rating-layanan1" class="rating rating-layanan col-xs-12">
								<div id="angka-rating1" class="angka-rating">
									<b>{{round(average($review,$menu->id_menu),1)}}</b>
								</div>
								<div id="star" class = "star-rating">
									@if(floor(average($review,$menu->id_menu))==0)	<span class="rating r0">1/5</span>
									@elseif(floor(average($review,$menu->id_menu))==1) <span class="rating r1">2/5</span>
									@elseif(floor(average($review,$menu->id_menu))==2) <span class="rating r2">3/5</span>
									@elseif(floor(average($review,$menu->id_menu))==3) <span class="rating r3">4/5</span>
									@elseif(floor(average($review,$menu->id_menu))==4)	<span class="rating r4">5 /5</span>
									@else	<span class="rating r5">1/5</span>
									@endif
								</div>
							</div>

							<div id = "semua-ulasan" class = "col-xs-12">
					        	<a href="#">Lihat semua ulasan</a>
					        </div>

					      </div>
					      <div class="modal-footer">
					      	<div id="footer-modal-menu" class =" col-xs-12">
								@if($menu->is_rekomendasi == 0)
									<a href= "rekomendasi/{{$menu->id_menu}}"><div class = "col-xs-5 col-xs-offset-3">
									Rekomendasi
									</div></a>

								@else
									<a href= "deleterekomendasi/{{$menu->id_menu}}"><div class = "col-xs-5 col-xs-offset-3">
									Hapus Rekomendasi
									</div></a>
								@endif


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
				<div class="modal fade" id="confirm-delete-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="selected">
			  		<div class="modal-dialog">
				    	<div class="modal-content">
				      		<div class="modal-header">
				        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="selected">&times;</span></button>
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
