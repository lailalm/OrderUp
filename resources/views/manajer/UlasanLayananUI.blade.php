@extends('manajer')

@section('content')
<div class="main col-md-10 col-md-offset-2">
	<div class="judul-halaman col-xs-10 col-xs-offset-1">
		Ulasan Layanan
	</div>

	<div class="isi" style="overflow:auto; max-height:470px; width:100%;">
		<!-- FOREACH EXCEPT THE FIRST ONE -->
		@foreach ($ulasan as $ulsan)
		<div id="ulasan-layanan1" class="col-xs-10 col-xs-offset-1 clearfix ulasan-layanan">
			<div id="judul-ulasan1" class="judul-ulasan col-xs-12">
				<div id="nomor-ulasan1" class="nomor-ulasan"> <!--increment untuk tiap ulasan-->
					{{$ulsan->id_review}} |
				</div>
				<div id="tanggal-ulasan1" class="tanggal-ulasan"> <!--tergantung tgl simpan ulasan-->
					{{$ulsan->created_at}}
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>

			<div class="col-xs-12">
				<div id="rating-layanan1" class="rating rating-layanan col-xs-4 col-xs-offset-1">
					<div id="angka-rating1" class="angka-rating">
						{{$ulsan->nilai}}
					</div>
					<div id="star" class = "star-rating">
						@if($ulsan->nilai===0)	<span class="rating r0">0/5</span>
						@elseif($ulsan->nilai===1) <span class="rating r1">1/5</span>
						@elseif($ulsan->nilai===2) <span class="rating r2">2/5</span>
						@elseif($ulsan->nilai===3) <span class="rating r3">3/5</span>
						@elseif($ulsan->nilai===4)	<span class="rating r4">4/5</span>
						@else	<span class="rating r5">5/5</span>
						@endif

					</div>
				</div>

				<div id="isi-ulasan-layanan1" class="isi-ulasan col-xs-6">
				{{$ulsan->review}}
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
			<div class="clearfix visible-xs-block"></div>
		</div>
		@endforeach
		<!-- ENDOFFOREACH -->
	</div>
</div>
@endsection
