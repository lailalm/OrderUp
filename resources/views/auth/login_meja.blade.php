<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>Order Up!</title>

		{!! HTML::style('assets/css/bootstrap.min.css') !!}
		{!! HTML::style('assets/css/bootstrap-theme.min.css') !!}
		{!! HTML::style('assets/css/stylePelanggan.css') !!}

		{!! HTML::script('assets/js/jquery-1.11.2.min.js') !!}
		{!! HTML::script('assets/js/jquery-migrate-1.2.1.min.js') !!}
		{!! HTML::script('assets/js/bootstrap.min.js') !!}
	</head>

	<body>
		<div id="main" class="col-sm-6 col-sm-offset-3">

			@if ($errors->any())
				<div class="alert alert-danger">
					<a href="#" class="close" data-dismiss="alert">&times;</a>
					<ul class="list-unstyled" style="margin-bottom:0">
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<div id="logo">
				{!! HTML::image('assets/img/logo.png', 'logo-order-up', ['width' => '90%']) !!}
			</div>

			<div id="login" class="col-sm-8 col-sm-offset-2 clearfix">
				<form id="formIn" class="form-horizontal" role="form" method="POST" action="{{ route('meja.login.submit') }}">
					{{ csrf_field() }}
					<input id="kode-in" type="text" required placeholder="Kode Meja" class="form-control" name="kode" autofocus>
					<div id="btnIn" class="col-xs-12">
						<button type="submit" id="btn-in" class="btn">Masuk</button>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>
