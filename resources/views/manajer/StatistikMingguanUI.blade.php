@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-6 col-xs-offset-1 space"> 
		Statistik Mingguan (Bulan Mei 2015)
	</div>

	<div class="judul-halaman col-xs-3 col-xs-offset-1 space"> 
		<select id="pilih-bulan" class="selectpicker" data-header="Bulan">
		  <option>Minggu 1</option> 
		  <option>Minggu 2</option>
		</select>
		
		<script>
			$('.selectpicker').selectpicker();
		</script>
	</div>
	
	<div id="bulan-stat" class="col-xs-10 col-xs-offset-1 clearfix">
		<!-- SPECIAL FOR THE FIRST -->
		<div id="foto-stat" class="foto-stat col-xs-5">
			<img src="assets/img/menu-utama.jpg" width= 100%>
		</div>

		<div id="stat1" class="stat1 col-xs-7">
			<div id ="nomor1">
				#1	
			</div>

			<div id ="nama1">
				Spaghetti Seafood
			</div>

			<div id ="total1">
				Total penjualan: 50 porsi
			</div>
		</div>
		<!-- END OF SPECIAL -->

		<div class="isi" style="overflow:auto; max-height:180px; width:100%;">
			<!-- FOREACH EXCEPT THE FIRST ONE -->
			<div id="stat2" class="isi-stat col-xs-12 clearfix">
				<div id="nomor-stat" class="bulan col-xs-3">
					#2
				</div>

				<div id-"nama-stat" class="col-xs-5">
					Fettucine Carbonara
				</div>

				<div id="total-stat" class="col-xs-4">
					Total penjualan: 40 porsi
				</div>
			</div>
			<!-- END OF FOREACH -->
		</div>

		<div id="total" class="total-penjualan col-xs-12 clearfix">
			<div class="col-xs-10">
				Total Penjualan
			</div>

			<div id="total-porsi" class="col-xs-2">
				125 porsi
			</div>
		</div>
	</div>
</div>
		
@endsection