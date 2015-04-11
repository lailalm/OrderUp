@extends('pelanggan')

@section('content')
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	<h4 class="white text-center">Daftar Pesanan</h4>

			@if (count($list_pesanan) <= 0)
				<h5 class="judul-role">
					Belum ada pesanan. Silahkan memesan.
				</h5>	
			@endif
		@foreach($list_pesanan as $pesanan)
		<div class="kotak-putih space">
			<div class="row">
				<div class="col-xs-5 padding-left">
					<h5>{!! App\Menu::find($pesanan->id_menu)->name !!}</h5>
					<h6>{{ $pesanan->jumlah }}</h6>
				</div>
				<div id="status-pesan" class="col-xs-4 clearfix">
					<h5><em>{{ $pesanan->status }}</em></h5>
				</div>
				<div class="col-xs-3 no-padding">
					@if ($pesanan->status == 'Queued')
						<button class="btn btn-primary space col-xs-12" data-toggle="modal" data-target="#confirm-modal{{ $pesanan->id_pemesanan }}"> 
							 X
						</button>
					@elseif ($pesanan->status == 'Done')
						<button class="btn btn-success space col-xs-12" data-toggle="modal" data-target="#batal-gagal-modal{{ $pesanan->id_pemesanan }}"> 
							 V
						</button>
					@else
						<button class="btn btn-warning space col-xs-12" data-toggle="modal" data-target="#batal-gagal-modal{{ $pesanan->id_pemesanan }}"> 
							 X
						</button>
					@endif
				</div>
			</div>
		</div>

		<!-- Modal Konfirm Batal -->
		<div class="modal fade" id="confirm-modal{{ $pesanan->id_pemesanan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
					
						{!! Form::open(array('route' => 'hapuspesanan' , 'class' => 'form-inline text-center center-block space-bottom')) !!}	
							<div class= "col-xs-12 clearfix space-bottom">
								Berapa porsi menu <b>{!! App\Menu::find($pesanan->id_menu)->name !!}</b> yang Anda ingin batalkan?
							</div>
							<input type="button" class="btn col-xs-1 col-xs-offset-2 add_subs" value=" - ">
							
							<div class="col-xs-6">
								<input name="countcancel" class="form-control" type="text" value="{{ $pesanan->jumlah }}"required>
							</div>
							<input type="button" class="col-xs-1 btn add_subs" value=" + ">
								<div id="btn-cancel" class="col-xs-10 col-xs-offset-1 space">
									<button data-dismiss="modal" class="btn btn-primary col-xs-5"> Cancel</button>
							{!! Form::hidden('id_pemesanan', $pesanan->id_pemesanan) !!}
							{!! Form::submit('Batalkan', array('class' => 'btn btn-primary col-xs-5 col-xs-offset-2')) !!}	

								</div>
							</input>
						{!! Form::close() !!}
						<br>
					</div>
					<div class="modal-footer row"></div>
				</div>
		  </div>
		</div>
		
		<!-- Modal Batal Gagal-->
		<div class="modal fade" id="batal-gagal-modal{{ $pesanan->id_pemesanan }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<form class="form-inline text-center center-block space-bottom">
							<div class= "col-xs-12 clearfix space-bottom">
								<h4>Mohon Maaf</h4>
								Pesanan menu <b>{!! App\Menu::find($pesanan->id_menu)->name !!}</b> Anda tidak bisa dibatalkan karena sudah dalam proses pembuatan.
							</div>
						</form>

						<div id="btn-kembali" class="col-xs-10 col-xs-offset-1 space">
							<button data-dismiss="modal" class="btn btn-primary col-xs-12"> Kembali</button>
						</div>
						<br>
					</div>
					<div class="modal-footer row"></div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>

<div id= "footer" class="col-xs-12">
	<a href="{{ URL::previous() }}">
    	{!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}              
    </a>
</div>
@endsection