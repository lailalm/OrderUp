@extends('manajer')

@section('content')

<div class="main col-md-10 col-md-offset-2">
	<div class ="col-md-3 col-md-offset-9 col-xs-10 col-xs-offset-1">
		<select class="selectpicker" data-header="Kategori Karyawan">
		  	<option>Pelayan</option>
		  	<option>Koki</option>
		</select>
		
		<script>
			$('.selectpicker').selectpicker();
		</script>
	</div>

	<div class="clearfix visible-xs-block"></div>

	<div id= "isi" class ="col-xs-12 clearfix">
		@foreach ($daftar_karyawan as $karyawan)
			<div id="menu1" class ="col-sm-3 col-xs-12" data-toggle="modal" data-target="#{{$karyawan->id_karyawan}}"> 
				{!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '100%')) !!}
				{{$karyawan->name}}		
			</div>
	        <div class="clearfix visible-xs-block"></div>	
		@endforeach
        <div class="clearfix visible-sm-block"></div>	
	</div>
</div>


@foreach ($daftar_karyawan as $karyawan)
	
	<!-- ini modal nampilin karyawan cuy -->
	<div class="modal fade" id="{{$karyawan->id_karyawan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
		    	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body">
					<div class="row">
						<div class="col-xs-6" id= "nama-menu">
							{!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '80%')) !!}
						</div>
						<div class="col-xs-6" >
							<h3>{{$karyawan->name}}</h3>
						</div>
						<div class="col-xs-6">
							<p>Alamat:{{$karyawan->alamat}}</p>
							<p>HP    :{{$karyawan->telepon}}</p>
							<p>Email :{{$karyawan->email}}</p>
							<p>Mulai Bekerja :{{$karyawan->tanggal_mulai}}</p>
						</div>
		        	</div>
		        	<div class="clearfix visible-xs-block"></div>
		       	</div>
		      	<div class="modal-footer">
		      		<div id="footer-modal-menu" class =" col-xs-12">
		      			<div id="footer-modal-menu" class ="col-xs-12">
							<a href= "#" data-toggle="modal" data-target="#create-pelayan-modal"><div class = "col-xs-10">
							Edit
						</div></a>
						<a href= "#" data-toggle="modal" data-target="#delete{{$karyawan->id_karyawan}}" data-dismiss="modal">
						<div class = "col-xs-2">
							Hapus
						</div></a>
						<div class="clearfix visible-xs-block"></div>
						</div>
						<div class="clearfix visible-xs-block"></div>
						<div class="clearfix visible-xs-block"></div>
					</div>
		      	</div>
		    </div>
		</div>
	</div>

	<!-- kalau ini modal nampilin function delete cuy -->
	<div class="modal fade" id="delete{{$karyawan->id_karyawan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		    <div class="modal-content">
		      	<div class="modal-header">
		        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		      	</div>
		      	<div class="modal-body">
					<div id= "delete-ques" class ="col-xs-12">
		      			Apakah Anda yakin ingin menghapus <b>{{$karyawan->name}}</b> sebagai {{$karyawan->role}}?
		      		</div>
		      	</div>
		    <div class="modal-footer">
		      	<div id="footer-modal-menu" class =" col-xs-12">
					<div class = "col-xs-3 col-xs-offset-3">
						<button id="batal-button" class="btn button col-xs-12">
							Batal
						</button>
					</div>
					<div class = "col-xs-3">
						<a id="hapus-button" class="btn button col-xs-12 " href="{{ URL::to('deletekaryawan/' . $karyawan->id_karyawan) }}">
							Hapus
						</a>
					</div>
					<div class="clearfix visible-xs-block"></div>
					<div class="clearfix visible-xs-block"></div>
				</div>
		      </div>
		    </div>
		</div>
		</div>
@endforeach

<div class="container">
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
				            <td>FotoMime</td>
				            <td>Foto Ori</td>
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
							<td>{!! HTML::image('../storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '90%')) !!}</td>
							<td>{{$karyawan->mime}}</td>
							<td>{{$karyawan->original_photoname}}</td>
							<td>{{$karyawan->telepon}}</td>
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
