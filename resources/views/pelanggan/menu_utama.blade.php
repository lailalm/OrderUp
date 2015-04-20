@extends('pelanggan')

@section('content')		
<div id = "content" class="clearfix">
	<div id="utama-title" class="col-xs-10 ">
		@if(Session::has('message'))				
		    <div class="alert {{ Session::get('alert-class') }}">
		        <a href="#" class="close" data-dismiss="alert">&times;</a>
		        {{ Session::get('message') }}
		    </div>
		@endif
		<h4 class="utama-title white"> Menu {{  ucfirst($kategori) }}</h4>
	</div>	
	<div id="content-menu" class="col-sm-10 col-sm-offset-1">	
		@foreach ($list_menu as $menu)	

		<div id="$menu->id_menu" class ="text-center space-bottom col-sm-4 col-xs-12 clear-fix" data-toggle="modal" data-target="#menu-modal"> 
      		{!! HTML::image('storage/app/'.$menu->photoname, 'panggil', array( 'width' => '100%', 'data-toggle' => 'modal', 'data-target' => '#menu-modal'.$menu->id_menu)) !!}
      		<div class="white">
      			@if($menu->is_rekomendasi == 1)
          			<i class="fa fa-star"></i>
          		@endif
	      		<b>{{$menu->name}}</b>
      		</div>
      	</div>
  		<div class="clearfix visible-xs-block space-bottom"></div>
		
		<!-- Modal Detail -->
		<div class="modal fade" id="menu-modal{{$menu->id_menu}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				
			    <div class="modal-content">
			      	<div class="modal-hea