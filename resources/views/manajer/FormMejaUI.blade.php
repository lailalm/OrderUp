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
                <h3>Tambah Meja</h3>

                <div class="form-group col-xs-8">
                    {!! Form::open(array('route' => 'addmeja_store', 'class' => 'form')) !!}
                    {!! Form::label('Nomor Meja') !!}
                    {!! Form::text('nomormeja', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'Masukkan Nomor Meja')) !!}
                </div>
                <div class="form-group col-xs-8">
                    {!! Form::label('Kode Masuk Meja') !!}
                    {!! Form::text('kodemasuk', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'Masukkan Kode Masuk Meja')) !!}
                </div>

                <div class="clearfix visible-xs-block"></div>
                
                <div class="form-group col-xs-12">
                    <label for="exampleInputDes">Deskripsi</label>
                     {!! Form::textarea('deskripsi', null, 
                        array('required', 'class'=>'form-control','rows'=>5, 'placeholder'=>'Masukkan Deskripsi Meja')) !!}
                </div>

                <div class="clearfix visible-xs-block"></div>

               
                <div class = "col-xs-3">
                    {!! Form::submit('Simpan', array('class' => 'btn btn-primary col-xs-12', 'id' => 'simpan-button')) !!}
                </div>
                <div class="clearfix visible-xs-block"></div>
                <div class="clearfix visible-xs-block"></div>
                {!! Form::close() !!}
            </div>            
        </div>   
    </div>
</div>

@endsection