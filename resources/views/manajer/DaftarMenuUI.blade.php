@extends('manajer')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11 col-md-offset-1">
			<div class ="col-md-3 col-md-offset-9 col-xs-10 col-xs-offset-1">
          	
          	<select class="selectpicker" data-header="Kategori Menu">
			  <option>Menu Promosi</option>
			  <option>Menu Rekomendasi</option>
			  <option>Menu Pembuka</option>
			  <option>Menu Utama</option>
			  <option>Menu Sampingan</option>
			  <option>Menu Penutup</option>
			  <option>Menu Minuman</option>
			</select>
			
			<script>
				$('.selectpicker').selectpicker();
			</script>
          	
          </div>
          <div id= "isi" class ="col-xs-12 clearfix">
			@foreach ($list_menu as $menu)
          	<div id="menu1" class ="col-sm-4 col-xs-12"> 
          		{!! HTML::image('../storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
          		{{$menu->name}}
          	</div>
      		<div class="clearfix visible-xs-block"></div>

      		<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			      </div>
			      <div class="modal-body">
			        {!! HTML::image('../storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%', 'data-toggle' => 'modal'.$menu->id_menu, 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
				        <div id= "nama-menu" class= "col-xs-8">
				        	{{$menu->name}}
				        </div>
				        
				         <div id= "status" class= "col-xs-4">
				        	Tersedia
				        </div>
				        <div class="clearfix visible-xs-block"></div>
				        
				        <div id= "penjelasan" class= "col-xs-10 col-xs-offset-1">
				        	Pasta homemade dengan daging asap dan saus krim gurih, ditaburi dengan keju parmesan.
				        </div>
				        
				        <div id = "harga-menu" class = "col-xs-12">
				        	Rp 35.000
				        </div>
				        
				      </div>
				      <div class="modal-footer">
				      	<div id="footer-modal-menu" class =" col-xs-12">
							<a href= "#"><div class = "col-xs-5 col-xs-offset-3">
								Rekomen
							</div></a>
					
							<a href= "#"><div class = "col-xs-2">
								Edit
							</div></a>
					
							<a href= "#"><div class = "col-xs-2">
								Hapus
							</div></a>
							<div class="clearfix visible-xs-block"></div>
						</div>
				      </div>
				    </div>
				  </div>
				</div>
	         @endforeach
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
