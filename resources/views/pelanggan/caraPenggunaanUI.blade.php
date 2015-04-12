@extends('pelanggan')

@section('content')
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	<h4 class="white text-center">Cara Penggunaan</h4>
	<div class="kotak-putih space">
		<div class="row isi-tutor">
			<div class="col-xs-12 judul-tutor">
				Melakukan Pemesanan
			</div>
			
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/pesan1.png">
			</div>
		
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/pesan2.png">
			</div>
		
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/pesan3.png">
			</div>
			<div class="clearfix visible-xs-block"></div>
			
		</div>
	</div>
	
	<div class="kotak-putih space">
		<div class="row isi-tutor">
			<div class="col-xs-12 judul-tutor">
				Melakukan Pembatalan Pesanan
			</div>
			
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/batal-pesan1.png">
			</div>
		
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/batal-pesan2.png">
			</div>
		
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/batal-pesan3.png">
			</div>
			<div class="clearfix visible-xs-block"></div>
			
		</div>
	</div>
	
	<div class="kotak-putih space">
		<div class="row isi-tutor">
			<div class="col-xs-12 judul-tutor">
				Melakukan Pembayaran
			</div>
			
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/bayar1.png">
			</div>
		
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/bayar2.png">
			</div>
		
			<div class="col-xs-4">
				<img class="foto-tutor" src ="assets/img/tutor/bayar3.png">
			</div>
			<div class="clearfix visible-xs-block"></div>
			
		</div>
	</div>
	
	<div class="kotak-putih space">
		<div class="row isi-tutor">
			Untuk informasi lebih lanjut harap <br> bertanya kepada pelayan					
		</div>
	</div>

</div>

<div class="pengisi-atas"></div>


<div id= "footer" class="col-xs-12">
	<a href= "{{ URL::previous() }}"><img src= "assets/img/kembali.png" width= 70px></a>
</div>
@endsection