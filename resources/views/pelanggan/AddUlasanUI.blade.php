@extends('pelanggan')

@section('content')
<div id = "content" class="clearfix">
	<div class="pengisi-atas"></div>
	<h4 class="text-center white">Bantu kami dalam memberikan layanan terbaik untuk Anda</h4>

	<div class="kotak-putih small-padding">
		<!-- ULASAN LAYANAN GOES HERE -->

		<h5>Ulasan Layanan</h5>
		  {!! Form::textarea('deskripsi', null, 
                        array('required', 'class'=>'form-control','rows'=>4, 'placeholder'=>'Tuliskan ulasan layanan Anda di sini')) !!}
		<div class="stars">
		    <input class="star star-5" id="star-5" type="radio" name="star"/>
		    <label class="star star-5" for="star-5"></label>
		    <input class="star star-4" id="star-4" type="radio" name="star"/>
		    <label class="star star-4" for="star-4"></label>
		    <input class="star star-3" id="star-3" type="radio" name="star"/>
		    <label class="star star-3" for="star-3"></label>
		    <input class="star star-2" id="star-2" type="radio" name="star"/>
		    <label class="star star-2" for="star-2"></label>
		    <input class="star star-1" id="star-1" type="radio" name="star"/>
		    <label class="star star-1" for="star-1"></label>
		</div>
		<hr>
		<!-- ULASAN MENU GOES HERE -->
		<div class="new_ulasan">
			<h5>Ulasan Menu</h5>
			<select class="selectpicker">
				<!-- FOREACH MENU YANG DIPESAN -->
				<option value="Menu1">Menu 1</option>
				<option value="Menu1">Menu 1</option>
				<option value="Menu1">Menu 1</option>
				<!-- END FOREACH -->
			</select>
	          <br><br>
			  {!! Form::textarea('deskripsi', null, 
	                        array('required', 'class'=>'form-control','rows'=>4, 'placeholder'=>'Tuliskan ulasan layanan Anda di sini')) !!}
			<div class="stars">
			    <input class="star star-5" id="star-51" type="radio" name="star1"/>
			    <label class="star star-5" for="star-51"></label>
			    <input class="star star-4" id="star-41" type="radio" name="star1"/>
			    <label class="star star-4" for="star-41"></label>
			    <input class="star star-3" id="star-31" type="radio" name="star1"/>
			    <label class="star star-3" for="star-31"></label>
			    <input class="star star-2" id="star-21" type="radio" name="star1"/>
			    <label class="star star-2" for="star-21"></label>
			    <input class="star star-1" id="star-11" type="radio" name="star1"/>
			    <label class="star star-1" for="star-11"></label>
			</div>
			<hr>
		</div>
		<h5 class="text-right"><a  class="harga-menu" id="addnewulasan">Tambah ulasan menu baru</a></h5>
		<a href="#" class="harga-menu col-xs-9 " style="font-size:90%; padding-top:10px; margin-btoom:20px;"> Lewatkan </a>
		<button class="btn btn-primary col-xs-3">Simpan</button>
		<div class="pengisi"></div>
	</div>
	
	<div class="pengisi"></div>

<script type="text/javascript">
	var onerow = $(".new_ulasan").clone();

	$('#addnewulasan').click(function(){
		one.appendTo(".new_ulasan");
	});
</script>
@endsection