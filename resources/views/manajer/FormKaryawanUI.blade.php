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
                <h3>Tambah {{ ucfirst($role) }}</h3>
                
                {!! Form::open(array('route' => 'addkaryawan_store', 'class' => 'form','files'=>true)) !!}

                <div class="form-group col-xs-12">

                    {!! Form::label('Nama*') !!}
                    {!! Form::text('name', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-12">

                    {!! Form::label('Email*') !!}
                    {!! Form::email('email', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div style="display:none;">
                    <div class="form-group">
                        {!! Form::label('Password') !!}
                        <input name="password" type="password" id="pass" value="123123123"> 
                    </div>

                    <div class="form-group">
                        {!! Form::label('Role') !!}
                        <select name="role" value="{{ $role }}">
                            <option selected="true">{{ $role }}</option>
                        </select>
                    </div>

                </div>

                <div class="form-group col-xs-12">
                    {!! Form::label('Alamat*') !!}
                    {!! Form::text('alamat', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-12">
                    <label>Telepon*</label>
                    {!! Form::text('telepon', null, 
                        array('required', 'class'=>'form-control', 'placeholder'=>'')) !!}
                </div>

                <div class="form-group col-xs-6">

                    {!! Form::label('Foto*') !!}

                    <input id="menu-pic" type="file" class="file" required
                    {!! Form::file('foto', array('required', 'class'=>'form-control')) !!}
                </div>


                <div class="form-group col-xs-6">
                    <label>Tanggal Mulai Bekerja*</label><br>
                    {!! Form::input('date', 'tanggal_mulai') !!}
                </div>

                <div class="clearfix visible-xs-block"></div>

                <div class="form-group col-xs-12">
                    <p>*harus diisi</p>
                </div>
                <div class = "col-xs-3 col-xs-offset-3">
                    <a href="{{ url('/manajerkaryawan') }}" id="batal-button" class="btn btn-primary col-xs-12">
                        Batal
                    </a>
                </div>
                <div class = "col-xs-3">
                    {!! Form::submit('Simpan', array('class' => 'btn btn-primary col-xs-12', 'id' => 'simpan-button')) !!}
                </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function generate()
    {
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for( var i = 0; i < 8; i++ )
            text += possible.charAt(Math.floor(Math.random() * possible.length));

        $('#pass').val(text);
    }

    generate();
</script>
@endsection