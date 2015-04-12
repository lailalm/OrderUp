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
            <div class="col-xs-12 panel" id="formEditKaryawan">
                <h3>Edit {{$karyawan->role}} #{{$karyawan->name}}</h3>

                {!! Form::model($karyawan, array('route' => array('editkaryawan_update', $karyawan->id_karyawan), 'method' => 'PUT','files'=>true)) !!}
                <div class="form-group col-xs-4">
                    {!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '100%')) !!}
                </div>
                <div class="form-group col-xs-8">
                    {!! Form::label('Nama') !!}
                    {!! Form::text('name', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-8">
                    {!! Form::label('Email') !!}
                    {!! Form::email('email', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>
                <div style="display:none;">
                    <div class="form-group col-xs-8">
                        {!! Form::label('Password') !!}
                        {!! Form::password('password', null, 
                            array('class'=>'form-control', 'placeholder'=>'')) !!}
                    </div>


                    <div class="form-group col-xs-8">
                        {!! Form::label('Role') !!}
                        <select name="role" value="{{ $karyawan->role }}">
                            <option selected="true">{{ $karyawan->role }}</option>
                        </select>
                    </div>

                </div>
                
                <div class="form-group col-xs-8">
                    {!! Form::label('Telepon') !!}
                    {!! Form::text('telepon', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-8">
                    {!! Form::label('Foto') !!}
                    <input id="menu-pic" type="file" class="file"
                    {!! Form::file('foto', array('class'=>'form-control')) !!}
                </div>

                <div class="form-group col-xs-8">
                    {!! Form::label('Alamat') !!}
                    {!! Form::text('alamat', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>


                <div class="form-group col-xs-8">
                    {!! Form::label('Tanggal Mulai') !!}
                    {!! Form::input('date', 'tanggal_mulai') !!}
                </div>

                <div class="form-group space space-bottom">
                    <div class = "col-xs-3">
                        <a href="{{ URL::previous() }}" id="batal-button" class="btn btn-primary col-xs-12">
                            Batal
                        </a>
                    </div>
                    <div class = "col-xs-3">
                        {!! Form::submit('Edit', array('class' => 'btn btn-primary col-xs-12', 'id' => 'simpan-button')) !!}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@endsection