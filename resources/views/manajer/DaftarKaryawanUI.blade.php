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
				<div class="panel-heading">
						<h1>Daftar Karyawan
						<a class="btn btn-small btn-success" href="{{ URL::to('addkaryawan/') }}">+</a></h1>
				</div>

				<div class="panel-body">

				<table class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <td>Nama</td>
				            <td>Email</td>
				            <td>Password</td>
				            <td>Role</td>
				            <td>Foto</td>
				            <td>Telepon</td>
				            <td>Alamat</td>
				            <td>Tanggal Mulai</td>
				            <td>Action</td>
				        </tr>
				    </thead>
				    <tbody>
					@foreach ($daftar_karyawan as $karyawan)
						<tr>
							<td>{{$karyawan->name}}</td>
							<td>{{$karyawan->email}}</td>
							<td>{{$karyawan->password}}</td>
							<td>{{$karyawan->role}}</td>
							<td>{{$karyawan->telepon}}</td>
							<td>{{$karyawan->foto}}</td>
							<td>{{$karyawan->alamat}}</td>
							<td>{{$karyawan->tanggal_mulai}}</td>
							<td>
								<a class="btn btn-small btn-info" href="{{ URL::to('editkaryawan/'. $karyawan->id_karyawan) }}">Edit</a>
								<a class="btn btn-small btn-success" href="{{ URL::to('deletekaryawan/' . $karyawan->id_karyawan) }}">Delete</a>
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
