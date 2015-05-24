@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-10 col-xs-offset-1"> 
		Rangkuman Statistik
	</div>
	<div class="isi col-xs-12" style="overflow:auto; height:470px;">
		<!-- FOREACH DI SINI -->
		@foreach($bulans as $bulan)
		<div id="rangkuman-stat1" class="rangkuman-stat col-xs-10 col-xs-offset-1 clearfix">
				<div id="bulan1" class="bulan col-xs-5 col-xs-offset-1">
					{{$bulan['nama']}} {{$bulan['tahun']}}
				</div>

				<div class="col-xs-3">
					Total Penjualan
				</div>

				<div id="total-penjualan1" class="total col-xs-3">
					<?php
					echo "Rp " .str_replace(",",".",number_format($bulan['jumlah'], 0)).",-";
					?>
					<!-- Rp {{$bulan['jumlah']}} -->
				</div>
		</div>
		@endforeach

	</div>
	<!-- ENDFOREACH -->
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
