@extends('manajer')

@section('content')

<div class="main col-md-10 col-md-offset-2">
  	<div class="clearfix visible-xs-block"></div>
  
  	<div id= "isi" class ="col-xs-12 clearfix">
  	@foreach ($daftar_meja as $meja)
	<div class ="daftar-meja col-sm-12 col-xs-12"> 
			<div class="col-sm-3 col-xs-3">
				<p class="style-font-meja">{{$meja->nomormeja}}</p>
			</div>
			
			<div class="col-sm-3 colxs-3">
				<p class="style-kode-login">{{$meja->kodemasuk}}</p>
			</div>
		<div class="col-sm-3 colxs-3">
			{{$meja->deskripsi}}
		</div>
		<div>
			<a class="btn btn-small btn-primary" href="{{ URL::to('editmeja/'. $meja->id_meja) }}">Edit</a>
			<a class="btn btn-small btn-primary" href="" data-toggle="modal" data-target="#confirm-delete-modal{{$meja->id_meja}}">Delete</a>
		</div>
		
	</div>
	<div class="daftar-meja clearfix visible-xs-block"></div>	
	<!-- MODAL CONFIRM DELETE -->
	<div class="modal fade" id="confirm-delete-modal{{$meja->id_meja}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  		<div class="modal-dialog">
	    	<div class="modal-content">
	      		<div class="modal-header">
	        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      		</div>
		      	<div class="modal-body">
			      	<div id= "delete-ques" class ="col-xs-12">
			      		Apakah Anda yakin ingin menghapus meja <b>{{$meja->nomormeja}}</b>?
			      	</div>
		      	</div>
		      
		      	<div class="modal-footer">
		      		<div id="footer-modal-menu" class =" col-xs-12">
						<div class = "col-xs-3 col-xs-offset-3">
							<button data-dismiss="modal" id="batal-button" class="btn button col-xs-12">
								Batal
							</button>
						</div>
			
						<div class = "col-xs-3">
							<a href="{{ URL::to('deletemeja/' . $meja->id_meja) }}" id="hapus-button" class="btn button col-xs-12">
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
	</div>
</div>

					
@endsection
