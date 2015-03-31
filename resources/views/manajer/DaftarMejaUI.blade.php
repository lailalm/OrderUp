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
				<div class="panel-heading">Daftar Meja
						<a class="btn btn-small btn-success" href="{{ URL::to('addmeja/') }}">Add Meja</a>
				</div>

				<div class="panel-body">

				<table class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <td>ID Meja</td>
				            <td>Kode Masuk</td>
				            <td>Deskripsi</td>
				            <td>Action</td>
				        </tr>
				    </thead>
				    <tbody>
					@foreach ($daftar_meja as $meja)
						<tr>
							<td>{{$meja->id_meja}}</td>
							<td>{{$meja->kodemasuk}}</td>
							<td>{{$meja->deskripsi}}</td>
							<td>
								<a class="btn btn-small btn-info" href="{{ URL::to('editmeja/'. $meja->id_meja) }}">Edit</a>
								<a class="btn btn-small btn-success" href="{{ URL::to('deletemeja/' . $meja->id_meja) }}">Delete</a>
							</td>
						</tr>
					@endforeach
					</tbody>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
