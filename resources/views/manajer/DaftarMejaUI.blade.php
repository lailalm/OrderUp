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
				<div class="panel-heading">Daftar Meja</div>

				<div class="panel-body">
					<table border="1">
					@foreach ($mejas as $meja)
						<tr>
						<td>{{$meja->id_meja}}</td>
						<td>{{$meja->kodemasuk}}</td>
						<td>{{$meja->deskripsi}}</td>
						</tr>
					@endforeach
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
