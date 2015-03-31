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
                <h1> Form Penambahan Meja </h1>
            </div>

            <div class="panel-body">
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
            </div>
        </div>
    </div>


@endsection