@extends('manajer')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-2">
			<h3 id="kategori" class="judul-home col-md-8">Daftar {{ ucfirst($role) }}</h3>
			<select 
				class="selectpicker col-md-4 space" 
				onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"
				>
			  	<option
			  		value="pelayan" 
			  		{{ $role === 'pelayan' ? 'selected' : '' }}>Pelayan</option>
			  	<option value="koki" 
			  		{{ $role === 'koki' ? 'selected' : '' }}>Koki</option>
			</select>
	

			<div id= "isi" class ="col-xs-12 clearfix">

			@if(Session::has('message'))				
			    <div class="alert {{ Session::get('alert-class') }}">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        {{ Session::get('message') }}
			    </div>
			@endif

			@if (count($daftar_karyawan) <= 0)
				<h5 class="judul-role">
					Belum ada data {{ $role }} terdaftar.
				</h5>	
			@endif

			@foreach ($daftar_karyawan as $karyawan)
				<div id="menu1" class ="col-sm-3 col-xs-12" data-toggle="modal" data-target="#{{$karyawan->id_karyawan}}"> 
					{!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '100%')) !!}
					{{$karyawan->name}}		
				</div>
				<div class="clearfix visible-xs-block"></div>	
			@endforeach
			</div>
		</div>
	</div>
</div>

<!-- MODAL KARYAWAN -->
@foreach ($daftar_karyawan as $karyawan)
<div class="modal fade" id="{{$karyawan->id_karyawan}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
	    	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      	</div>
	      	<div class="modal-body">
				<div class="row">
					<div class="col-xs-6" id= "nama-menu">
						{!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '100%')) !!}
					</div>
					<div class="col-xs-6" >
						<h3>{{$karyawan->name}}</h3>
						<hr>
					</div>
					<div class="col-xs-6">
						<p>{{$karyawan->alamat}}</p>
						<p>{{$karyawan->telepon}}</p>
						<p>{{$karyawan->email}}</p>
						<hr>
						<p>Mulai Bekerja : {{$karyawan->tanggal_mulai}}</p>

					</div>
	        	</div>
	        	<div class="clearfix visible-xs-block"></div>

	       	</div>
	      	<div class="modal-footer">
	      		<div id="footer-modal-menu" class =" col-xs-12">
	      			<div id="footer-modal-menu" class ="col-xs-12">
						<a href= "{{ URL::to('editkaryawan/'. $karyawan->id_karyawan) }}" >							<div class = "col-xs-10">
								Edit
							</div>
						</a>
						<a href= "#" data-toggle="modal" data-target="#delete{{$karyawan->id_karyawan}}" data-dismiss="modal">
							<div class = "col-xs-2">
								Hapus
							</div>
						</a>
						<div class="clearfix visible-xs-block"></div>
					</div>
					<div class="clearfix visible-xs-block"></div>
					<div class="clearfix visible-xs-block"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MODAL CONFIRM DELETE -->
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
				<div data-dismiss="modal" class = "col-xs-3 col-xs-offset-3">
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
@endsection
