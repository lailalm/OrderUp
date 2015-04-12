@extends('koki')

@section('content')
<div class="main col-md-9 col-md-offset-2">
	<label class="judul-home">Daftar Pesanan</label>
	<div class="clearfix visible-xs-block"></div>
	<!-- MASUKIN FOREACH DI SINI -->
	<div id= "isi" class ="col-xs-12 clearfix">
		<div class ="konten-koki col-sm-12 col-xs-12"> 
			
		@foreach ($pemesanan as $pemesanan)
			<div class="row">
				<div class="col-sm-5 col-xs-5">
					<p class="style-font-meja">Meja {!! App\Meja::find($pemesanan->id_meja)->nomormeja !!}</p>
				</div>
			</div>
			<div class="col-xs-12 row baris-pesan">
				<div class="col-sm-3 col-xs-4 konten-status-menu">
					{!! App\Menu::find($pemesanan->id_menu)->name !!}
				</div>
				<div class="col-sm-2 col-xs-4 konten-status-menu text-center">
					{{$pemesanan->jumlah}} Porsi
				</div>
				<div class="col-sm-3 col-xs-4 konten-status-menu text-center">
					{{$pemesanan->keterangan}}
				</div>
				<div class="clearfix visible-xs-block"></div>
			
				<div class="col-sm-4 col-xs-12 text-center">
					<div id = "btn-status-pesan" class="btn-group">
						@if( $pemesanan->status == 'Queued')
							<a href="{{ url('/changestatus/waiting/'. $pemesanan->id_pemesanan) }}" class="btn btn-primary">
								Waiting
						  	</a>
						  	<a href="{{ url('/changestatus/process/'. $pemesanan->id_pemesanan) }}" class="btn abu">
								On Process
						  	</a>
						  	<a href="{{ url('/changestatus/done/'. $pemesanan->id_pemesanan) }}" class="btn abu">
								Done
						  	</a>
					  	@elseif ($pemesanan->status == 'On Process')
						  	<a href="{{ url('/changestatus/waiting/'. $pemesanan->id_pemesanan) }}" class="btn abu">
								Waiting
						  	</a>
						  	<a href="{{ url('/changestatus/process/'. $pemesanan->id_pemesanan) }}" class="btn btn-warning">
								On Process
						  	</a>
						  	<a href="{{ url('/changestatus/done/'. $pemesanan->id_pemesanan) }}" class="btn abu">
								Done
						  	</a>
						@else
							<a href="{{ url('/changestatus/waiting/'. $pemesanan->id_pemesanan) }}" class="btn abu">
								Waiting
						  	</a>
						  	<a href="{{ url('/changestatus/process/'. $pemesanan->id_pemesanan) }}" class="btn abu">
								On Process
						  	</a>
						  	<a href="{{ url('/changestatus/done/'. $pemesanan->id_pemesanan) }}" class="btn btn-success">
								Done
						  	</a>
					  	@endif
					  	
					</div>
					<div class="clearfix visible-xs-block"></div>
				</div>
				<div class="clearfix visible-xs-block"></div>
				<div class="clearfix visible-sm-block"></div>
			</div>
		@endforeach
	</div>
</div>
	

</div>
@endsection