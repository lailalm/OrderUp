@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-10 col-xs-offset-1"> 
		Ulasan Menu [INSERT NAMA MENU HERE]
	</div>

	<div class="isi" style="overflow:auto; max-height:470px; width:100%;">
		<!-- FOREACH EXCEPT THE FIRST ONE -->
		<div id="ulasan-layanan1" class="col-xs-10 col-xs-offset-1 clearfix ulasan-layanan">
			<div id="judul-ulasan1" class="judul-ulasan col-xs-12">
				<div id="nomor-ulasan1" class="nomor-ulasan"> <!--increment untuk tiap ulasan-->
					#2 |
				</div>
				<div id="tanggal-ulasan1" class="tanggal-ulasan"> <!--tergantung tgl simpan ulasan-->
					15 Mei 2015
				</div>
			</div>	
			<div class="clearfix visible-xs-block"></div>
			
			<div class="col-xs-12">
				<div id="rating-layanan1" class="rating rating-layanan col-xs-4 col-xs-offset-1">
					<div id="angka-rating1" class="angka-rating">
						4
					</div>
					<div id="star" class = "star-rating">
						<span class="rating r4">1/5</span>

						<!--RATING
						rating: 0 berarti class = "r0"
						rating: 1 berarti class = "r1"
						rating: 2 berarti class = "r2"
						rating: 3 berarti class = "r3"
						rating: 4 berarti class = "r4"
						rating: 5 berarti class = "r5"-->
					</div>
				</div>
				
				<div id="isi-ulasan-layanan1" class="isi-ulasan col-xs-6">
					Tempatnya asik banget buat ngobrol bareng temen-temen :)
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
			<div class="clearfix visible-xs-block"></div>
		</div>
		<!-- ENDOFFOREACH -->
	</div>
	<div id="kembali-ke-menu" class="col-xs-10 col-xs-offset-1 ulasan-layanan">
		<a href="{{ URL::previous() }}">Kembali ke detil menu</a>
	</div>
</div>	
@endsection