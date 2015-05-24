@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-6 col-xs-offset-1 space"> 
		Statistik Bulanan
	</div>
		
	<div class="judul-halaman col-xs-3 col-xs-offset-1 space"> 
		<select id="pilih-bulan" class="selectpicker" data-header="Bulan">
		@foreach($bulans as $key=>$value)
			<option>{{$key}}</option>
		@endforeach
		</select>
		
		<script>
			$('.selectpicker').selectpicker();
		</script>
	</div>
	
	<div id="bulan-stat" class="col-xs-10 col-xs-offset-1 clearfix">
		<!-- SPECIAL FOR THE FIRST -->
		@foreach($bulans[$namaBulan]['menu'] as $key=>$value)
		<div id="foto-stat" class="foto-stat col-xs-5">
			<img src="assets/img/menu-utama.jpg" width= 100%>
			{{$value['image']}}
		</div>

		<div id="stat1" class="stat1 col-xs-7">
			<div id ="nomor1">
				#1	
			</div>

			<div id ="nama1">
				{{$value['nama']}}
			</div>

			<div id ="total1">
				Total penjualan: {{$value['jumlah']}} porsi
			</div>
		</div>
		@endforeach

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
				{{$bulans[$namaBulan]['jumlah']}} porsi
			</div>
		</div>
	</div>
</div>
		
@endsection