@extends('pelanggan')

@section('content')
<script type="text/javascript">
	var ulasan_menu = 1;
</script>
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	<h4 class="text-center white">Bantu kami dalam memberikan layanan terbaik untuk Anda</h4>

	<div class="kotak-putih small-padding">
		<!-- ULASAN LAYANAN GOES HERE -->
		{!! Form::open(array('route' => 'simpanulasan', 'class' => 'form')) !!}
		<h4>Ulasan Layanan</h4>
		{!! Form::textarea('deskripsiRestoran', null,
            array('class'=>'form-control','rows'=>4, 'placeholder'=>'Tuliskan ulasan layanan Anda di sini')) !!}
        {!! Form::hidden('total', count($id_name)) !!}


		<div class="stars">
		    <input class="star star-5" id="star-5" type="radio" name="star" value="5" />
		    <label class="star star-5" for="star-5"></label>
		    <input class="star star-4" id="star-4" type="radio" name="star" value="4"/>
		    <label class="star star-4" for="star-4"></label>
		    <input class="star star-3" id="star-3" type="radio" name="star" value="3"/>
		    <label class="star star-3" for="star-3"></label>
		    <input class="star star-2" id="star-2" type="radio" name="star" value="2"/>
		    <label class="star star-2" for="star-2"></label>
		    <input class="star star-1" id="star-1" type="radio" name="star" value="1"/>
		    <label class="star star-1" for="star-1"></label>
		</div>
		<div style="display:none">
			<input type="text" class="form-control" name="nilailayanan" id="nilailayanan">
		</div>
		<script type="text/javascript">
			$("input:radio[name=star]").click(function() {
			    $("#nilailayanan").val($(this).val());
			});
		</script>
		<hr>

		<!-- ULASAN MENU GOES HERE -->
		@for ($i = 1; $i < count($id_name) + 1; $i++)
		<div class="new_ulasan{{ $i }}" >
			<h4>Ulasan Menu {{ $i }}</h4>
			{!! Form::select('selectbox'.$i , $id_name, null, array('class' => 'form-control selectpicker' )) !!}
	          <br><br>
	        {!! Form::hidden('id'.$i, array_keys($id_name)[$i-1]) !!}
			{!! Form::textarea('deskripsi'.$i, null,
	                        array('class'=>'form-control','rows'=>4, 'placeholder'=>'Tuliskan ulasan menu Anda di sini')) !!}
			<div class="stars">
			    <input class="star star-5" id="star-5{{ $i }}" type="radio" name="star{{ $i }}" value="5"/>
				<label class="star star-5" for="star-5{{ $i }}"></label>
			    <input class="star star-4" id="star-4{{ $i }}" type="radio" name="star{{ $i }}" value="4" />
			    <label class="star star-4" for="star-4{{ $i }}"></label>
			    <input class="star star-3" id="star-3{{ $i }}" type="radio" name="star{{ $i }}" value="3" />
			    <label class="star star-3" for="star-3{{ $i }}"></label>
			    <input class="star star-2" id="star-2{{ $i }}" type="radio" name="star{{ $i }}" value="2" />
			    <label class="star star-2" for="star-2{{ $i }}"></label>
			    <input class="star star-1" id="star-1{{ $i }}" type="radio" name="star{{ $i }}" value="1" />
			    <label class="star star-1" for="star-1{{ $i }}"></label>
			</div>
			<div style="display:none">
				<input type="text" class="form-control" name="nilaimenu{{ $i }}" id="nilaimenu{{ $i }}">
			</div>
			<script type="text/javascript">
				$("input:radio[name=star{{ $i }}]").click(function() {
				    $("#nilaimenu{{ $i }}").val($(this).val());
				});
			</script>
			<hr>
		</div>
		@endfor

		<h5 class="text-right"><a  class="harga-menu" id="addnewulasan">Tambah ulasan menu baru</a></h5>

		<a href="#" data-toggle="modal" data-target="#konfirmasilewatkan" class="harga-menu col-xs-9 " style="font-size:90%; padding-top:10px; margin-btoom:20px;"> Lewatkan </a>

		{!! Form::submit('Simpan', array('class'=>'btn btn-primary col-xs-3')) !!}
		{!! Form::close()!!}
		<div class="pengisi"></div>
	</div>

	<div class="pengisi"></div>

<!-- MODAL -->
<div class="modal fade" id="konfirmasilewatkan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
	      	 <div class= "col-xs-12 clearfix space-bottom">
        		Tidak ingin memberikan ulasan?
        	</div>
        	<div class="col-xs-8 col-xs-offset-2">
        		{!! Form::open(array('route' => 'logout')) !!}
        		{!! Form::hidden('cara', 'tunai') !!}
					</div>
        	<div id="btn-cancel" class="col-xs-10 col-xs-offset-1 space">
				<button data-dismiss="modal" class="btn btn-primary col-xs-5">Batal</button>
				{!! Form::submit('Ya', array('class'=>'btn btn-primary col-xs-5 col-xs-offset-2')) !!}
				{!! Form::close()!!}
			</div>

        <br>
      </div>
      <div class="modal-footer row">

      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
	var ulasan_menu = 1;

	//initialize
	for(var ii = 2; ii < {{ count($id_name) }} + 1; ii++) {
		$(".new_ulasan" + ii).hide("fast");
	}


	$('#addnewulasan').click(function(){
		if (ulasan_menu <  {{ count($id_name) }})
			$(".new_ulasan" + ++ulasan_menu).show("slow");

		if (ulasan_menu ==  {{ count($id_name) }})
			$('#addnewulasan').hide('slow');
	});

	//additional function




</script>
@endsection
