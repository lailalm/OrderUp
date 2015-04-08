@extends('koki')

@section('content')
<div class="main col-md-9 col-md-offset-2">
	<label class="judul-home">Daftar Pesanan</label>
	<div class="clearfix visible-xs-block"></div>
	<!-- MASUKIN FOREACH DI SINI -->
	<div id= "isi" class ="col-xs-12 clearfix">
		<div class ="konten-koki col-sm-12 col-xs-12"> 
			<div class="row">
			<div class="col-sm-5 col-xs-5">
				<p class="style-font-meja">Meja 1</p>
			</div>
		</div>
		<!-- MASUKIN FOREACH PESANAN BY MEJA -->
		<div class="col-xs-12 row baris-pesan">
			<div class="col-sm-3 col-xs-4 konten-status-menu">
				Fettuccine Carbonara
			</div>
			<div class="col-sm-2 col-xs-4 konten-status-menu text-center">
				1 Porsi
			</div>
			<div class="col-sm-3 col-xs-4 konten-status-menu text-center">
				Kurangi Pedas
			</div>
			<div class="clearfix visible-xs-block"></div>
		
			<div class="col-sm-4 col-xs-12 text-center">
				<div id = "btn-status-pesan" class="btn-group" data-toggle="buttons">
					<label id="btn-wait" class="btn">
						<input type="radio" name="options" id="wait" autocomplete="off"> Waiting
				  	</label>
				  	<label id="btn-process" class="btn">
						<input type="radio" name="options" id="process" autocomplete="off"> On Process
				  	</label>
				  	<label id="btn-done" class="btn">
						<input type="radio" name="options" id="done" autocomplete="off"> Done
				  	</label>
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="clearfix visible-sm-block"></div>
		</div>
	
		<div class="col-xs-12 row baris-pesan">
			<div class="col-sm-3 col-xs-4 konten-status-menu">
				Fettuccine Carbonara
			</div>
			<div class="col-sm-2 col-xs-4 konten-status-menu text-center">
				1 Porsi
			</div>
			<div class="col-sm-3 col-xs-4 konten-status-menu text-center">
				Kurangi Pedas
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="col-sm-4 col-xs-12 text-center">
				<div id = "btn-status-pesan" class="btn-group" data-toggle="buttons">
					<label id="btn-wait2" class="btn">
						<input type="radio" name="options" id="wait" autocomplete="off"> Waiting
					</label>
					<label id="btn-process2" class="btn">
						<input type="radio" name="options" id="process" autocomplete="off"> On Process
					</label>
					<label id="btn-done2" class="btn">
						<input type="radio" name="options" id="done" autocomplete="off"> Done
					</label>
				</div>
				<div class="clearfix visible-xs-block"></div>
			</div>
			<div class="clearfix visible-xs-block"></div>
			<div class="clearfix visible-sm-block"></div>
		</div>
	</div>
</div>
	

</div>

<script>
	$('#btn-wait2').click(function(){  
	  $(this).css('background-color', '#bb2828');
	  $('#btn-process2').css('background-color', '#9f9f9f');
	  $('#btn-done2').css('background-color', '#9f9f9f');
	});
	
	$('#btn-process2').click(function(){  
	  $('#btn-wait2').css('background-color', '#9f9f9f');
	  $(this).css('background-color', '#fce809');
	  $('#btn-done2').css('background-color', '#9f9f9f');
	});
	
	$('#btn-done2').click(function(){  
	  $('#btn-wait2').css('background-color', '#9f9f9f');
	  $('#btn-process2').css('background-color', '#9f9f9f');
	  $(this).css('background-color', 'green');
	});
	</script>
@endsection