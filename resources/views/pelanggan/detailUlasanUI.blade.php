@extends('pelanggan')

@section('content')
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	<h4 class="white text-center">Ulasan Menu ###</h4> <!--sesuai dgn menu yg lagi dilihat-->
	<div class="kotak-putih space">
		<div class="row">
			<div id="judul-ulasan1" class="ulasan judul-ulasan col-xs-12">
				<div id="nomor-ulasan1" class="nomor-ulasan"> <!--increment untuk tiap ulasan-->
					#2 |
				</div>
				<div id="tanggal-ulasan1" class="tanggal-ulasan"> <!--tergantung tgl simpan ulasan-->
					15 Mei 2015
				</div>
			</div>	
			<div class="clearfix visible-xs-block"></div>
				
			<div class=" ulasan col-xs-12 space-bottom">
				<div id="rating-menu1" class="rating rating-menu col-xs-12 col-sm-4 col-sm-offset-1">
					<div class="text-center angka-rating">
						444
					</div>
					<div class = "text-center star-rating">
						<span class="rating r5">1/5</span>

						<!--RATING
						rating: 0 berarti class = "r0"
						rating: 1 berarti class = "r1"
						rating: 2 berarti class = "r2"
						rating: 3 berarti class = "r3"
						rating: 4 berarti class = "r4"
						rating: 5 berarti class = "r5"-->
					</div>
				</div>
				<div class="clearfix visible-xs-block"></div>
				
				<div id="isi-ulasan-menu1" class="isi-ulasan col-xs-12 col-sm-6">
					This menu is superb! One of the best in Jakarta.
				</div>

			</div>
		</div>
	</div>
</div>

<div id= "footer" class="col-xs-12">
	<a href="{{ URL::previous() }}">
    	{!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}              
    </a>
</div>
@endsection