@extends('manajer')

@section('content')


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

            <div class="col-xs-12 panel" id="formEditKaryawan">
                <h3>Tambah Menu {{ $promosi? "Promosi" : "" }}</h3>

                <div class="form-group col-xs-8">
                    {!! Form::open(array('route' => 'addmenu_store', 'class' => 'form', 'name'=>'add-menu', 'files'=>true)) !!}

                    <label for="exampleInputNama">Nama Menu*</label>
                    {!! Form::text('name', null, array('required', 'class'=>'form-control', 'id'=>'exampleInputNama', 'placeholder'=>'Nama Menu')) !!}
                </div>

                <div class="form-group col-xs-4">
                    <label for="exampleInputAlamat">Harga*</label>
                    {!! Form::text('harga', null, 
                    array('required', 'type'=>'number', 'class'=>'form-control', 'id'=>'exampleInputAlamat', 'placeholder'=>'Contoh : 1000')) !!}
                </div>
                <div class="clearfix visible-xs-block"></div>
                
                <div class="form-group col-xs-12">
                    <label for="exampleInputDes">Deskripsi*</label>
                     {!! Form::textarea('deskripsi', null, 
                        array('required', 'class'=>'form-control','rows'=>5, 'placeholder'=>'Masukkan Deskripsi Menu')) !!}
                </div>

                <div class="form-group col-xs-6">
                    <label for="exampleInputKat">Kategori Menu*</label> <br>
                    {!! Form::select('kategori', array('Menu Pembuka' => 'Menu Pembuka', 
                                                        'Menu Utama' => 'Menu Utama',
                                                        'Menu Sampingan' => 'Menu Sampingan',
                                                        'Menu Penutup' => 'Menu Penutup',
                                                        'Menu Minuman' => 'Menu Minuman'), null, 
                                                        ['class' => 'selectpicker']) !!}
                        
                </div>

                <div class="form-group col-xs-6">
                    <label for="Gamber Menu">Gambar Menu*</label>
                    <input id="menu-pic" type="file" class="file"
                    {!! Form::file('foto', array('class'=>'form-control')) !!}
                </div> 
                
                <div class="clearfix visible-xs-block"></div>
                 
                 @if ($promosi)
                    <div class="form-group col-xs-12">
                        <label for="exampleInputDes">Tanggal Terakhir Promosi </label>
                        <br>
                        {!! Form::input('date', 'end_date_promosi') !!}
                    </div>
                    <div style="display:none;">
                        Yes {!! Form::radio('is_promosi', 1, true) !!}
                        No {!! Form::radio('is_promosi', 0, false) !!}

                        Yes {!! Form::radio('is_rekomendasi', 1, false) !!}
                        No {!! Form::radio('is_rekomendasi', 0, true) !!}
         
                        {!! Form::input('date', 'end_date_rekomendasi') !!}

                        {!! Form::text('diskon', null, 
                        array('class'=>'form-control', 'placeholder'=>'')) !!}

                        {!! Form::text('durasi_penyelesaian', null, 
                        array('class'=>'form-control', 'placeholder'=>'')) !!}

                        Available {!! Form::radio('status', 1, true) !!}
                        Not Available {!! Form::radio('status', 0, false) !!}
 
                    </div>
                @else
                    <div style="display:none;">
                        Yes {!! Form::radio('is_rekomendasi', 1, false) !!}
                        No {!! Form::radio('is_rekomendasi', 0, true) !!}
         
                        {!! Form::input('date', 'end_date_rekomendasi') !!}
                        
                        Yes {!! Form::radio('is_promosi', 1, false) !!}
                        No {!! Form::radio('is_promosi', 0, true) !!}
            
                        {!! Form::input('date', 'end_date_promosi') !!}

                        {!! Form::text('diskon', null, 
                        array('class'=>'form-control', 'placeholder'=>'')) !!}

                        {!! Form::text('durasi_penyelesaian', null, 
                        array('class'=>'form-control', 'placeholder'=>'')) !!}

                        Available {!! Form::radio('status', 1, true) !!}
                        Not Available {!! Form::radio('status', 0, false) !!}
                    </div>  
                @endif

                <div class="clearfix visible-xs-block"></div>


                <div class="form-group col-xs-12">
                    <p>*harus diisi</p>
                </div>
                <div class = "col-xs-3 col-xs-offset-3">
                    <a href="{{ url('/manajermenu') }}" id="batal-button" class="btn btn-primary col-xs-12">
                        Batal
                    </a>
                </div>
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

<script type="text/javascript">
    var validator = new FormValidator('add-menu', [{
            name: 'harga',
            display: 'Harga',
            rules: 'numeric|greater_than[0]'
        },
        {
            name: 'foto',
            display: 'Gambar Menu',
            rules: 'required|is_file_type[gif,png,jpg]'
        },
        {
            name:'name',
            display: 'Nama Menu',
            rules:'required'
        },
        {
            name: 'deskripsi',
            display: 'Deskripsi Menu',
            rules: 'required'
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