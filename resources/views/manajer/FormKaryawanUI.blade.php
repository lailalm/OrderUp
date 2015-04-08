@extends('manajer')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>
<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="col-xs-12 panel" id="formEditKaryawan">
                <h3>Tambah Koki</h3>
                
                {!! Form::open(array('route' => 'addkaryawan_store', 'class' => 'form','files'=>true)) !!}

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
                     <div class="form-group">
                        {!! Form::label('Password') !!}
                        <input name="password" type="password" id="pass" value="123123123"> 
                    </div>


                </div>

                    <div class="form-group">
                        {!! Form::label('Role') !!}
                        
                        {!! Form::select('role', array('Koki' => 'Koki', 'Pelayan' => 'Pelayan')); !!}
                    </div>
                <div class="form-group col-xs-8">
                    {!! Form::label('Alamat') !!}
                    {!! Form::text('alamat', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-8">
                    <label>Telepon</label>
                    {!! Form::text('telepon', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-8">
                    {!! Form::label('Foto') !!}

                    <input id="menu-pic" type="file" class="file"
                    {!! Form::file('foto', array('required', 'class'=>'form-control')) !!}
                </div>


                <div class="form-group col-xs-10">
                    <label>Tanggal Mulai Bekerja</label>
                    {!! Form::input('date', 'tanggal_mulai') !!}
                </div>

                <div class="clearfix visible-xs-block"></div>

                <div class="form-group col-xs-4">
                    {!! Form::submit('Submit', array('class' => 'btn btn-primary col-xs-12')) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection