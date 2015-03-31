@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>
<div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1> Edit Menu ID #{{$menu->id_menu}} - {{$menu->name}} </h1>
            </div>

            <div class="panel-body">
                {!! Form::model($menu, array('route' => array('editmenu_update', $menu->id_menu), 'method' => 'PUT')) !!}

                <div class="form-group">
                    {!! Form::label('Nama') !!}
                    {!! Form::text('name', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Harga') !!}
                    {!! Form::text('harga', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Kategori') !!}
                    {!! Form::select('kategori', array('Makanan' => 'Makanan', 'Minuman' => 'Minuman')) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Gambar') !!}
                    {!! Form::text('gambar', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <hr>
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
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>
                <hr><br>

                <div class="form-group">
                    {!! Form::label('Durasi') !!}
                    {!! Form::text('durasi_penyelesaian', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group">
                    <h3>{!! Form::label('Status') !!}</h3>
                    Available {!! Form::radio('status', 1, true) !!}
                    Not Available {!! Form::radio('status', 0, false) !!}
                </div>


                <div class="form-group">
                    {!! Form::submit('Edit', array('class' => 'btn btn-info')) !!}
                </div>
            </div>
        </div>
    </div>

{!! Form::close() !!}


@endsection