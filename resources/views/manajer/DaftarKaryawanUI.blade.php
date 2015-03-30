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
					<table border="1">
					@foreach ($karyawans as $karyawan)
						<tr>
						<td>{{$karyawan->id_karyawan}}</td>
						<td>{{$karyawan->name}}</td>
						<td>{{$karyawan->email}}</td>
						<td>{{$karyawan->password}}</td>
						<td>{{$karyawan->role}}</td>
						<td>{!! HTML::image('assets/img/yantohidayat.jpg', 'panggil', array( 'width' => '120px')) !!}</td>
						<td>{{$karyawan->telepon}}</td>
						<td>{{$karyawan->alamat}}</td>
						<td>{{$karyawan->tanggal_mulai}}</td>
						</tr>
					@endforeach
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
@endsection
