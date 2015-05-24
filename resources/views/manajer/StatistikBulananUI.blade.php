@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-6 col-xs-offset-1 space"> 
		Statistik Bulanan
	</div>
		
	<div class="judul-halaman col-xs-3 col-xs-offset-1 space"> 
		<select id="pilih-bulan" class="selectpicker" data-header="Bulan"
				onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
			>
		@foreach($bulans as $key=>$value)
			<option value="{{$key}}" {{ $namaBulan === $key ? 'selected' : '' }}> {{$key}}</option>
		@endforeach
		</select>
		
		<script>
			$('.selectpicker').selectpicker();
		</script>
	</div>
	
	<div id="bulan-stat" class="col-xs-10 col-xs-offset-1 clearfix">
		<!-- SPECIAL FOR THE FIRST -->
		<?php  $first = true; ?>
		@foreach($bulans[$namaBulan]['menu'] as $value)
		@if($first)
		<div id="foto-stat" class="foto-stat col-xs-5">
			{!! HTML::image('storage/app/'.$value['image'], 'lala', array( 'width' => '100%')) !!}
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
		@endif
		<?php  $first = false; ?>
		@endforeach

		<div class="isi" style="overflow:auto; max-height:180px; width:100%;">
			<!-- FOREACH EXCEPT THE FIRST ONE -->
			<?php  $numb = 1; ?>
			@foreach($bulans[$namaBulan]['menu'] as $value)
			@if ($numb != 1)
			<div id="stat2" class="isi-stat col-xs-12 clearfix">
				<div id="nomor-stat" class="bulan col-xs-3">
					#<?php echo "".$numb; ?>
				</div>

				<div id-"nama-stat" class="col-xs-5">
					{{$value['nama']}}
				</div>

				<div id="total-stat" class="col-xs-4">
					Total penjualan: {{$value['jumlah']}} porsi
				</div>
			</div>
			@endif
			<?php $numb = $numb + 1; ?>
			@endforeach
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