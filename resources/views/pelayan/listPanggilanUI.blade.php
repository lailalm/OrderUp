@extends('pelayan')

@section('content')
<div class="main col-md-9 col-md-offset-2">
	<label class="judul-home">Daftar Pemanggilan</label>
	<div class="clearfix visible-xs-block"></div>
	<!-- MASUKIN FOREACH DI SINI -->
	<div id= "isi" class ="col-xs-12 clearfix">
		<div class ="konten-koki col-sm-12 col-xs-12"> 
			
		@foreach ($panggilan as $panggilan)
			<div class="row">
				<p class="style-font-meja">Meja {!! App\Meja::find($panggilan->id_meja)->nomormeja !!}</p>
			</div>
			<div class="col-xs-17 row baris-pesan">
				<div class="col-sm-8 col-xs-5">
					{{$panggilan->pesan}}
				</div>

				<div class="clearfix visible-xs-block"></div>
			
				<div class="col-sm-4 col-xs-9 text-center">
					{!! Form::open(array('route' => 'removepemanggilan')) !!}
					{!! Form::hidden('id_pemanggilan', $panggilan->id_pemanggilan) !!}
					{!! Form::submit('X', array('class' => 'btn btn-primary space col-xs-12')) !!}
					{!! Form::close() !!}		
				<div class="clearfix visible-xs-block"></div>
				</div>
				<div class="clearfix visible-xs-block"></div>
				<div class="clearfix visible-sm-block"></div>
			</div>
			<hr>
			
		@endforeach
	</div>
</div>
	

</div>
@endsection