@extends('manajer')

@section('content')
<div id = "content" class="clearfix">
	<div id="ulasan-layanan" class="col-xs-10 col-xs-offset-1 clearfix">
		<div id="judul-ulasan" class="col-xs-12">
			<div id="nomor-ulasan"> <!--increment untuk tiap ulasan-->
				#1 |
			</div>
			<div id="tanggal-ulasan"> <!--tergantung tgl simpan ulasan-->
				10 Mei 2015
			</div>
		</div>	
		<div class="clearfix visible-xs-block"></div>
		
		<div class="col-xs-12">
			<div id="rating-layanan" class="rating col-xs-4 col-xs-offset-1">
				HAHA
			</div>
			
			<div id="isi-ulasan-layanan" class="isi-ulasan col-xs-6">
				Tempatnya asik banget buat ngobrol bareng temen-temen :)
			</div>
			<div class="clearfix visible-xs-block"></div>
		</div>
		<div class="clearfix visible-xs-block"></div>
	</div>
</div>
@endsection