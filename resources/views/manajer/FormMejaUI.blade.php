@extends('app')

@section('content')

<ul>
    @foreach($errors->all() as $error)
        <li></li>
    @endforeach
</ul>

<h1> Form Penambahan Meja </h1>

{!! Form::open(array('route' => 'addmeja_store', 'class' => 'form')) !!}

<div class="form-group">
    {!! Form::label('Kode Masuk Meja') !!}
    {!! Form::text('kodemasuk', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'Masukkan Kode Masuk Meja')) !!}
</div>

<div class="form-group">
    {!! Form::label('Deskripsi') !!}
    {!! Form::textarea('deskripsi', null, 
        array('required', 'class'=>'form-control', 'placeholder'=>'Masukkan Deskripsi Meja')) !!}
</div>

<div class="form-group">
	{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
</div>

{!! Form::close() !!}


@endsection