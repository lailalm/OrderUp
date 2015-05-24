@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-10 col-xs-offset-1"> 
		Rangkuman Statistik
	</div>
	<div class="isi col-xs-12" style="overflow:auto; height:470px;">
		<!-- FOREACH DI SINI -->
		<div id="rangkuman-stat1" class="rangkuman-stat col-xs-10 col-xs-offset-1 clearfix">
			@foreach($bulans as $bulan)
				<div id="bulan1" class="bulan col-xs-5 col-xs-offset-1">
					{{$bulan['nama']}} {{$bulan['tahun']}}
				</div>

				<div class="col-xs-3">
					Total Penjualan
				</div>

				<div id="total-penjualan1" class="total col-xs-3">
					Rp {{$bulan['jumlah']}}
				</div>
			@endforeach
		</div>
	</div>
	<!-- ENDFOREACH -->
</div>
		
@endsection
