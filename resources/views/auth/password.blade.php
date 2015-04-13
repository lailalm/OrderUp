@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@if (session('status'))
				<div class="alert alert-success">
					{{ session('status') }}
				</div>
			@endif

			@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<div id ="logo">
		        {!! HTML::image('assets/img/logo.png', 'logo-order-up', array( 'width' => '70%')) !!}
			</div>
			
			<form id= "login" class ='col-sm-8 col-sm-offset-2' method="POST" action="{{ url('/password/email') }}">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">

				<div class="col-md-4 control-label space">Email Address</div>
				<div class="col-md-6">
					<input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Masukkan alamat email Anda">
				</div>

				<div class="col-md-6 col-md-offset-4">
					<button type="submit" class="btn btn-primary">
						Send Password Reset Link
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection
