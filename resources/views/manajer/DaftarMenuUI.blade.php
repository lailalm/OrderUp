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
						<h1>Daftar Menu
						<a class="btn btn-small btn-success" href="{{ URL::to('addmenu/') }}">+</a></h1>
				</div>

				<div class="panel-body">

				<table class="table table-striped table-bordered">
				    <thead>
				        <tr>
				            <td>Nama</td>
				            <td>Harga</td>
				            <td>Kategori</td>
				            <td>Gambar</td>
				            <td>Rekomendasi?</td>
				            <td>EDR</td>
				            <td>Promosi?</td>
				            <td>EDP</td>
				            <td>Diskon</td>
				            <td>Durasi</td>
				            <td>Status</td>
				            <td>Action</td>
				        </tr>
				    </thead>
				    <tbody>
					@foreach ($list_menu as $menu)
						<tr>
							<td>{{$menu->name}}</td>
							<td>{{$menu->harga}}</td>
							<td>{{$menu->kategori}}</td>
							<td>{{$menu->gambar}}</td>
							<td>{{$menu->is_rekomendasi}}</td>
							<td>{{$menu->end_date_rekomendasi}}</td>
							<td>{{$menu->is_promosi}}</td>
							<td>{{$menu->end_date_promosi}}</td>
							<td>{{$menu->diskon}}</td>
							<td>{{$menu->durasi_penyelesaian}}</td>
							<td>{{$menu->status}}</td>
							<td>
								<a class="btn btn-small btn-info" href="{{ URL::to('editmenu/'. $menu->id_menu) }}">Edit</a>
								<a class="btn btn-small btn-success" href="{{ URL::to('deletemenu/' . $menu->id_menu) }}">Delete</a>
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
