@extends('pelayan')

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

            <div id="error-cont" class="alert alert-danger" style="display:none;">
                <!-- <a href="#" class="close" data-dismiss="alert">&times;</a> -->
                <p id="error-msg"></p>
            </div>

            <div class="judul-halaman col-xs-10 col-xs-offset-1">
  						Lihat Profil
  					</div>
            <div id="form-edit-profil" class="col-xs-10 col-xs-offset-1 clearfix">
              <div class="pull-right">
                <button id="edit-btn" class="btn btn-primary">Ubah Profil</button>
              </div>
              {!! Form::model($karyawan, array('route' => array('editprofiluser'), 'name'=>'edit-profile', 'method' => 'PUT','files'=>true)) !!}
							<div class="col-xs-4">
								<div id="foto-profil" class="col-xs-12">
                  {!! HTML::image('storage/app/'.$karyawan->photoname, $karyawan->name, array( 'width' => '100%')) !!}
								</div>
                <div class="form-group col-xs-12">
                  <div id="judul-mulai-kerja">
                      {!! Form::label('Mulai Bekerja: ') !!}
                  </div>
                  <div id="mulai-kerja"> <!--retrieve dari database-->
                    {{ $karyawan->tanggal_mulai}}
                  </div>
                  <div class="form-group col-xs-12">
                      <p>*wajib diisi</p>
                  </div>

                </div>
							</div>

							<div class="col-xs-8">
								<div class="form-group col-xs-12">
                  {!! Form::label('Nama*') !!}
                  {!! Form::text('name', null,
                      array('required',  'disabled', 'class'=>'form-control', 'placeholder'=>'Nama')) !!}
								</div>
								<div class="clearfix visible-xs-block"></div>

								<div id="ganti-kode" class="form-group col-xs-12" style="display:none;">
									<a href="#" data-toggle="modal" data-target="#ganti-kode-modal">Ubah Kode Log In</a>
								</div>
								<div class="clearfix visible-xs-block"></div>

								<div class="form-group col-xs-12">
                  {!! Form::label('Alamat*') !!}
                  {!! Form::textarea('alamat', null,
                      array('required', 'disabled', 'class'=>'form-control', 'placeholder'=>'Alamat', 'rows'=>'3')) !!}
								</div>
								<div class="clearfix visible-xs-block"></div>

								<div class="form-group col-xs-12">
                  {!! Form::label('Email*') !!}
                  {!! Form::email('email', null,
                      array('required', 'disabled', 'class'=>'form-control', 'placeholder'=>'E-mail')) !!}
								</div>
								<div class="clearfix visible-xs-block"></div>

								<div class="form-group col-xs-12">
                  {!! Form::label('Telepon*') !!}
                  {!! Form::text('telepon', null,
                      array('required', 'disabled', 'class'=>'form-control', 'placeholder'=>'Format penulisan: +62[Nomor HP Anda')) !!}
								</div>
								<div class="clearfix visible-xs-block"></div>

                <div class="form-group col-xs-12">
                  {!! Form::label('Foto') !!}
                  <input id="menu-pic" type="file" class="file"
                  {!! Form::file('foto', array( 'disabled','class'=>'form-control')) !!}
								</div>
								<div class="clearfix visible-xs-block"></div>


								<div class="clearfix visible-xs-block"></div>

							</div>
							<div class="clearfix visible-xs-block"></div>

              <div class="form-group space space-bottom">
                  <div class = "group-btn-edit col-xs-3 col-xs-offset-3"  style="display:none;">
                      <a href="#" id="batal-button" class="btn btn-primary col-xs-12">
                          Batal
                      </a>
                  </div>
                  <div class = "group-btn-edit col-xs-3"  style="display:none;">
                      {!! Form::submit('Ubah', array('class' => 'btn btn-primary col-xs-12', 'id' => 'simpan-button')) !!}
                  </div>
              </div>
							<div class="clearfix visible-xs-block"></div>
              {!! Form::close() !!}
						</div>

            <div class="modal fade" id="ganti-kode-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        			<div class="modal-dialog">
        				<div class="modal-content">
        					<div class="modal-header">
        						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        					</div>
        					<div class="modal-body">
                    {!! Form::model($karyawan, array('route' => array('editkodeloginkoki'), 'name'=>'edit-kodelogin', 'method' => 'PUT','files'=>true)) !!}
                    <h3> Ubah Kode Login </h3>
                    <div class="form-group col-xs-12">
                      {!! Form::label('Kode Lama') !!}
                      {!! Form::password('old_pw',array('required', 'class'=>'form-control')) !!}
    								</div>
                    <div class="form-group col-xs-12">
                      {!! Form::label('Kode Baru') !!}
                      {!! Form::password('new_pw',array('required', 'class'=>'form-control')) !!}
                    <span id="result"></span>
    								</div>
                    <div class="form-group col-xs-12">
                      {!! Form::label('Ulangi Kode Baru') !!}
                      {!! Form::password('new_pw_conf',array('required', 'class'=>'form-control')) !!}
    								</div>

                    <div class = "col-xs-3 col-xs-offset-3">
                        <a href="#"  data-dismiss="modal" class="btn btn-primary col-xs-12">
                            Batal
                        </a>
                    </div>
                    <div class = "col-xs-3">
                        {!! Form::submit('Ubah', array('class' => 'btn btn-primary col-xs-12')) !!}
                    </div>
                    {!! Form::close() !!}

        					</div>
        					<div class="modal-footer row"></div>
        				</div>
        		  </div>
        		</div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $('#edit-btn').click(function() {
    $("[name='name']").prop("disabled", false);
    $("[name='alamat']").prop("disabled", false);
    $("[name='email']").prop("disabled", false);
    $("[name='foto']").prop("disabled", false);
    $("[name='telepon']").prop("disabled", false);
    $('.judul-halaman').text('Ubah Profil');

    $('.judul-halaman').text('Ubah Profil');
    $('.group-btn-edit').show('slow');
    $('#ganti-kode').show('slow');
    $('#edit-btn').hide('slow');

  });

  $('#batal-button').click(function() {
    $("[name='name']").prop("disabled", true);
    $("[name='alamat']").prop("disabled", true);
    $("[name='email']").prop("disabled", true);
    $("[name='foto']").prop("disabled", true);
    $("[name='telepon']").prop("disabled", true);
    $('.judul-halaman').text('Ubah Profil');

    $('.judul-halaman').text('Lihat Profil');
    $('.group-btn-edit').hide('slow');
    $('#ganti-kode').hide('slow');
    $('#edit-btn').show('slow');

  });

  var validator = new FormValidator('edit-profile', [{
            name: 'name',
            display: 'Nama',
            rules: 'required'
        },
        {
            name: 'alamat',
            display: 'Alamat',
            rules: 'required'
        },
        {
            name:'email',
            display: 'Email',
            rules:'required|email'
        },
        {
            name: 'telepon',
            display: 'Telepon',
            rules: 'required|numeric'
        },
        {
            name: 'foto',
            display: 'Foto',
            rules: 'is_file_type[gif,png,jpg]'
        }
        ], function(errors, event) {
            var SELECTOR_ERRORS = $('#error-msg');

            if (errors.length > 0) {
                // Show the errors
                SELECTOR_ERRORS.empty();
                for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
                    SELECTOR_ERRORS.append(errors[i].message + '<br />');
                }
                $('#error-cont').show("slow");
                // alert('errors!!');
            }
        });
</script>

@endsection
