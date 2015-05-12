@extends('pelanggan')

@section('content')
<?php
	$total = 0;
?>
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	@if(Session::has('message'))
	    <div class="alert {{ Session::get('alert-class') }}">
	        <a href="#" class="close" data-dismiss="alert">&times;</a>
	        {{ Session::get('message') }}
	    </div>
	@endif
	<h4 class="white text-center">Pembayaran</h4>

        @if (count($list_pesanan) <= 0)
		<h5 class="judul-role white">
			Belum ada tagihan. Silahkan memesan terlebih dahulu.
		</h5>
        @endif
	@foreach($list_pesanan as $pesanan)
	<div class="kotak-putih space">
		 <div class="row">
			<div class="col-xs-4 padding-left">
				<h5><b>{!! App\Menu::find($pesanan->id_menu)->name !!}</b></h5>
				<h6>{{ $pesanan->jumlah }} porsi</h6>
			</div>
			<div id="harga-satu" class="col-xs-4 text-center clearfix">
				<h6>
					<?php
		        		echo "Rp " .str_replace(",",".",number_format(App\Menu::find($pesanan->id_menu)->harga, 0)).",-"
		        	?>
				</h6>
			</div>
			<div id="total" class="col-xs-4 text-center no-padding">
				<h5 id=>
					<?php
						$total = $total +  App\Menu::find($pesanan->id_menu)->harga * $pesanan->jumlah;
		        		echo "Rp " .str_replace(",",".",number_format(App\Menu::find($pesanan->id_menu)->harga * $pesanan->jumlah, 0)).",-"
		        	?>
				</h5> <!--total = harga x porsi-->
			</div>
		</div>
	</div>
	@endforeach

	<div class="kotak-putih space">
		<div class="row">
			<div class="col-xs-8 text-center padding-left">
				<h4><b>Total</b></h4>
			</div>
			<div id="total-beli" class="col-xs-4 clearfix">
				<?php
					echo "Rp " .str_replace(",",".",number_format($total, 0)).",-";
				?><!--total dari semuanya-->
			</div>
		</div>
	</div>
</div>
@if (count($list_pesanan) <= 0)
<div id="content1" class="container space">
	<div id= "pembayaran-main" class="col-sm-8 col-sm-offset-2">
		<div id= "cara-bayar" class= "col-sm-6 row text-center">
			<div id="btn-bayar3" class = "col-xs-12">
				<a href="{{ url('/auth/logout') }}">
					{!! HTML::image('assets/img/logout.png', 'panggil', array( 'width' => '70px')) !!}
				</a>
			</div>
                 </div>
         </div>
</div>
@else
<!-- pilih cara bayar -->
<div id="content1" class="container space">
	<div id= "pembayaran-main" class="col-sm-8 col-sm-offset-2">
		<div id= "cara-bayar" class= "col-sm-6 row">
			<div id="btn-bayar1" class = "col-xs-4">
				<a href=# data-toggle="modal" data-target="#tunai-modal">
					{!! HTML::image('assets/img/tunai.png', 'panggil', array( 'width' => '70px')) !!}
				</a>
			</div>

			<div id="btn-bayar2" class = "col-xs-4">
				<a href="{{ url('debit')}}">
					{!! HTML::image('assets/img/debit.png', 'panggil', array( 'width' => '70px')) !!}
				</a>
			</div>

			<div id="btn-bayar3" class = "col-xs-4">
				<a href="{{ url('kredit')}}">
					{!! HTML::image('assets/img/kredit.png', 'panggil', array( 'width' => '70px')) !!}
				</a>
			</div>

			<div class="clearfix visible-xs-block">

			</div>
		</div>
	</div>
</div>
@endif

<div class="pengisi-atas"></div>

<!-- Modal Konfirm Batal -->
<div class="modal fade" id="tunai-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
	      	 <div class= "col-xs-12 clearfix space-bottom">
        		Masukkan nominal uang yang akan Anda gunakan
        	</div>
        	<div class="col-xs-8 col-xs-offset-2">
        		{!! Form::open(array('route' => 'bayar')) !!}
	        	{!! Form::text('nominal', null, array('class' => 'form-control', 'placeholder' => 'Contoh: 100000', 'required')) !!}
        	</div>
        	<div id="btn-cancel" class="col-xs-10 col-xs-offset-1 space">
				<button data-dismiss="modal" class="btn btn-primary col-xs-5">Batal</button>
				{!! Form::submit('Bayar', array('class'=>'btn btn-primary col-xs-5 col-xs-offset-2')) !!}
				{!! Form::close()!!}
			</div>

        <br>
      </div>
      <div class="modal-footer row">

      </div>

    </div>
  </div>
</div>

<div id= "footer" class="col-xs-12">
	<a href="{{ url('/')}}">
    	{!! HTML::image('assets/img/kembali.png', 'panggil', array( 'width' => '70px')) !!}
    </a>
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
