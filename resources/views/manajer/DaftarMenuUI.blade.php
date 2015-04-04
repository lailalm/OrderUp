@extends('manajer')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
						<h1>Daftar Menu
						<a class="btn btn-small btn-success" href="{{ URL::to('addmenu/') }}">+</a></h1>
				</div>

				<div class="panel-body">

				<table class="table table-striped table-bordered">
				    
				    <tbody>
					@foreach ($list_menu as $menu)
						<tr>
							<td>{{$menu->name}}</td>
							<td>{{$menu->harga}}</td>
							<td>{{$menu->kategori}}</td>
							<td>{{$menu->photoname}}</td>
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
