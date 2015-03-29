@extends('app')

@section('content')
<div class="container">
	<h4>ceritanya dibawah ini mau dinaikin ke atas</h4>
	<a href="manajermenu">Menu</a>
	<a href="manajerkaryawan">Karyawan</a>
	<a href="manajermeja">Meja</a>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Daftar Karyawan</div>

				<div class="panel-body">
					@foreach ($karyawans as $karyawan)
						<h2>{{$karyawan}}</h2>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
