@extends('koki')

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

            <div class="judul-halaman col-xs-10 col-xs-offset-1">
  						Edit Profil
  					</div>

              <div id="form-edit-profil" class="col-xs-10 col-xs-offset-1 clearfix">
                  {!! Form::model($karyawan, array('route' => array('editkaryawan_update', $karyawan->id_karyawan), 'method' => 'PUT','files'=>true)) !!}
                  <div class="form-group col-xs-4">
                      {!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '100%')) !!}
                  </div>
                  <div class="form-group col-xs-8">
                      {!! Form::label('Nama*') !!}
                      {!! Form::text('name', null,
                          array('required', 'class'=>'form-control', 'placeholder'=>'Nama')) !!}
                  </div>
                  <div id="ganti-kode" class="form-group col-xs-8">
                    <a href="#" data-toggle="modal" data-target="#ganti-kode-modal">Ganti Kode Log In</a>
                  </div>

                  <div class="form-group col-xs-8">
                      {!! Form::label('Alamat*') !!}
                      {!! Form::textarea('alamat', null,
                          array('required', 'class'=>'form-control', 'placeholder'=>'Alamat', 'rows'=>'3')) !!}
                  </div>

                  <div class="form-group col-xs-8">
                      {!! Form::label('Email*') !!}
                      {!! Form::email('email', null,
                          array('required', 'class'=>'form-control', 'placeholder'=>'E-mail')) !!}
                  </div>

                  <div class="form-group col-xs-8">
                      {!! Form::label('Password*') !!}
                      {!! Form::password('password', null,
                          array('class'=>'form-control', 'placeholder'=>'Password')) !!}
                  </div>

                  <div style="display:none;">
                      <div class="form-group col-xs-8">
                          {!! Form::label('Role') !!}
                          <select name="role" value="{{ $karyawan->role }}">
                              <option selected="true">{{ $karyawan->role }}</option>
                          </select>
                      </div>

                  </div>

                  <div class="form-group col-xs-8">
                      {!! Form::label('Telepon*') !!}
                      {!! Form::text('telepon', null,
                          array('required', 'class'=>'form-control', 'placeholder'=>'Format penulisan: +62[Nomor HP Anda')) !!}
                  </div>

                  <div class="form-group col-xs-8">
                      {!! Form::label('Foto*') !!}
                      <input id="menu-pic" type="file" class="file"
                      {!! Form::file('foto', array('class'=>'form-control')) !!}
                  </div>




                  <div class="form-group col-xs-8">
                      {!! Form::label('Mulai Bekerja: '.$karyawan->tanggal_mulai) !!}
                  </div>

                  <div class="form-group col-xs-12">
                      <p>*wajib diisi</p>
                  </div>

                  <div class="form-group space space-bottom">
                      <div class = "col-xs-3 col-xs-offset-3">
                          <a href="{{ url('/manajerkaryawan') }}" id="batal-button" class="btn btn-primary col-xs-12">
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
