@extends('pelanggan')

@section('content')
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	<h4 class="white text-center">Ulasan Menu {{$menu}}</h4> <!--sesuai dgn menu yg lagi dilihat-->

	<div class="kotak-putih space">
		<div class="row">
			@foreach($ulasanmknn as $key=>$ul)
			<div id="judul-ulasan1" class="ulasan judul-ulasan col-xs-12">
				<div id="nomor-ulasan1" class="nomor-ulasan"> <!--increment untuk tiap ulasan-->
					#{{$key+1}} |
				</div>
				<div id="tanggal-ulasan1" class="tanggal-ulasan"> <!--tergantung tgl simpan ulasan-->
					{{$ul->created_at}}
				</div>
			</div>
			<div class="clearfix visible-xs-block"></div>

			<div class=" ulasan col-xs-12 space-bottom">
				<div id="rating-menu1" class="rating rating-menu col-xs-12 col-sm-4 col-sm-offset-1">
					<div class="text-center angka-rating">
						{{$ul->nilai}}
					</div>
					<div class = "text-center star-rating">
						@if($ul->nilai===0)	<span class="rating r0">0/5</span>
						@elseif($ul->nilai===1) <span class="rating r1">1/5</span>
						@elseif($ul->nilai===2) <span class="rating r2">2/5</span>
						@elseif($ul->nilai===3) <span class="rating r3">3/5</span>
						@elseif($ul->nilai===4)	<span class="rating r4">4/5</span>
						@else	<span class="rating r5">5/5</span>
						@endif
					</div>
				</div>
				<div class="clearfix visible-xs-block"></div>

				<div id="isi-ulasan-menu1" class="isi-ulasan col-xs-12 col-sm-6">
					{{$ul->komentar}}
				</div>

			</div>
			@endforeach
		</div>
	</div>
</div>

<div id= "footer" class="col-xs-12">
	<a href="{{ URL::previous() }}">
    	{!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}
    </a>
</div>
@endsection
