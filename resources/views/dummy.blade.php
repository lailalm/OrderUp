@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-10 col-xs-offset-1"> 
		Rangkuman Statistik
	</div>
	
	<div id="rangkuman-stat1" class="rangkuman-stat col-xs-10 col-xs-offset-1 clearfix">
		<div id="bulan1" class="bulan col-xs-5 col-xs-offset-1">
			April 2015
		</div>

		<div class="col-xs-3">
			Total Penjualan
		</div>

		<div id="total-penjualan1" class="total col-xs-3">
			Rp 10.000.000
		</div>
	</div>

	<div class="rangkuman-stat col-xs-10 col-xs-offset-1 clearfix">
		<div id="bulan2" class="bulan col-xs-5 col-xs-offset-1">
			Maret 2015
		</div>

		<div class="col-xs-3">
			Total Penjualan
		</div>

		<div id="total-penjualan2" class="total col-xs-3">
			Rp 8.500.000
		</div>
	</div>
</div>
		
@endsection