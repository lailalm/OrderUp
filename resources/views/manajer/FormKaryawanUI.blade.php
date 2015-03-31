@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>

<h1> Form Penambahan Karyawan </h1>

{!! Form::open(array('route' => 'addkaryawan_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Nama') !!}
    {!! Form::text('name', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
</div>

<div class="form-group">
    {!! Form::label('Email') !!}
    {!! Form::email('email', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
</div>

<div class="form-group">
    {!! Form::label('Password') !!}
    {!! Form::password('password', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
</div>


<div class="form-group">
    {!! Form::label('Role') !!}
    {!! Form::select('role', array('Koki' => 'Koki', 'Pelayan' => 'Pelayan')); !!}
</div>

<div class="form-group">
    {!! Form::label('Telepon') !!}
    {!! Form::text('telepon', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
</div>

<div class="form-group">
    {!! Form::label('Foto') !!}
    {!! Form::text('foto', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
</div>

<div class="form-group">
    {!! Form::label('Alamat') !!}
    {!! Form::text('alamat', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
</div>


<div class="form-group">
    {!! Form::label('Tanggal Mulai') !!}
    {!! Form::input('date', 'tanggal_mulai') !!}
</div>

<div class="form-group">
	{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
</div>

{!! Form::close() !!}


@endsection