@extends('manajer')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            @if(Session::has('message'))                
                <div class="alert {{ Session::get('alert-class') }}">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {{ Session::get('message') }}
                </div>
            @endif
            <div class="col-xs-12 panel" id="formEditKaryawan">
                {!! Form::model($menu, array('route' => array('editmenu_update', $menu->id_menu), 'method' => 'PUT','files'=>true)) !!}
                
                <h3>Ubah Menu {{ $menu->is_promosi? "Promosi" : ""}}</h3>
                <div class="form-group col-xs-6">
                    {!! HTML::image('storage/app/'.$menu->photoname, 'lala', array( 'width' => '100%')) !!}
                </div>
                <div class="form-group col-xs-6">
                    {!! Form::label('Nama') !!}
                    {!! Form::text('name', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('Harga') !!}
                         {!! Form::text('harga', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}

                    
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('Kategori') !!}<br>
                    {!! Form::select('kategori', array('Menu Pembuka' => 'Menu Pembuka', 
                                                'Menu Utama' => 'Menu Utama',
                                                'Menu Sampingan' => 'Menu Sampingan',
                                                'Menu Penutup' => 'Menu Penutup',
                                                'Menu Minuman' => 'Menu Minuman'), null, 
                                                ['class' => 'selectpicker']) !!}
                </div>

                <div class="form-group col-xs-6">
                    {!! Form::label('Gambar Menu') !!}
                    <input id="menu-pic" type="file" class="file"
                    {!! Form::file('foto', array('class'=>'form-control')) !!}
                </div>

                <div class="form-group col-xs-12">
                    {!! Form::label('Deskripsi') !!}
                    {!! Form::textarea('deskripsi', null, 
                        array('required', 'class'=>'form-control','rows'=>5, 'placeholder'=>'Masukkan Deskripsi Menu')) !!}
                </div>

            @if ($menu->is_promosi)
                <div class="form-group col-xs-12">
                    {!! Form::label('Tanggal Berakhir Promosi') !!}
                    {!! Form::input('date', 'end_date_promosi') !!}
                </div>

                <div style="display:none;">
                    <div class="form-group">
                        <h2>{!! Form::label('Rekomendasi?') !!}</h2>
                        Yes {!! Form::radio('is_rekomendasi', 1, false) !!}
                        No {!! Form::radio('is_rekomendasi', 0, true) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('EDR') !!}
                        {!! Form::input('date', 'end_date_rekomendasi') !!}
                    </div>
                    <hr>
                    <div class="form-group">
                        <h2>{!! Form::label('Promosi?') !!}</h2>
                        Yes {!! Form::radio('is_promosi', 1, true) !!}
                        No {!! Form::radio('is_promosi', 0, false) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Diskon') !!}
                        {!! Form::text('diskon', null, 
                            array('class'=>'form-control', 'placeholder'=>'')) !!}
                    </div>
                    <hr><br>

                    <div class="form-group">
                        {!! Form::label('Durasi') !!}
                        {!! Form::text('durasi_penyelesaian', null, 
                            array('class'=>'form-control', 'placeholder'=>'')) !!}
                    </div>

                    <div class="form-group">
                        <h3>{!! Form::label('Status') !!}</h3>
                        Available {!! Form::radio('status', 1, true) !!}
                        Not Available {!! Form::radio('status', 0, false) !!}
                    </div>
                </div>
            @else
                <div style="display:none;">
                    <div class="form-group">
                        <h2>{!! Form::label('Rekomendasi?') !!}</h2>
                        Yes {!! Form::radio('is_rekomendasi', 1, false) !!}
                        No {!! Form::radio('is_rekomendasi', 0, true) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('EDR') !!}
                        {!! Form::input('date', 'end_date_rekomendasi') !!}
                    </div>
                    <hr>
                    <div class="form-group">
                        <h2>{!! Form::label('Promosi?') !!}</h2>
                        Yes {!! Form::radio('is_promosi', 1, false) !!}
                        No {!! Form::radio('is_promosi', 0, true) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('EDP') !!}
                        {!! Form::input('date', 'end_date_promosi') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('Diskon') !!}
                        {!! Form::text('diskon', null, 
                            array('class'=>'form-control', 'placeholder'=>'')) !!}
                    </div>
                    <hr><br>

                    <div class="form-group">
                        {!! Form::label('Durasi') !!}
                        {!! Form::text('durasi_penyelesaian', null, 
                            array('class'=>'form-control', 'placeholder'=>'')) !!}
                    </div>

                    <div class="form-group">
                        <h3>{!! Form::label('Status') !!}</h3>
                        Available {!! Form::radio('status', 1, true) !!}
                        Not Available {!! Form::radio('status', 0, false) !!}
                    </div>
                </div>  
            @endif

                <div class="form-group">
                    <div class = "col-xs-3 col-xs-offset-3">
                        <a href="{{ URL::previous() }}" id="batal-button" class="btn btn-primary col-xs-12">
                            Batal
                        </a>
                    </div>
                    <div class = "col-xs-3">
                        {!! Form::submit('Edit', array('class' => 'col-xs-12 btn btn-primary', 'id' => 'simpan-button')) !!}
                    </div>
                </div>
                
            </div>
        </div>  
    </div>
</div>


@endsection