<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>{{config('app.judul')}}</title>

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="{{asset('bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('/css/style.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('/font-awesome-4.7.0/css/font-awesome.min.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('/bootstrap-navbar/css/navbar.css')}}">

	<link rel="stylesheet" type="text/css" href="{{asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css')}}">

	<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/buttons.dataTables.min.css')}}">

	<style type="text/css">
	.title{
		border-bottom: 3px solid #27ae60;
	}
	.keterangan{
		font-size: 11px;
		color: #9E9E9E;
	}
</style>

</head>
<body>
	<div class="logo-header">
		<div class="container">
			<div class="row">
				<div class="col-md-2">
					<div class="logo hidden-sm hidden-xs">
						<img src="{{asset('logo_tegal.png')}}" class="img-responsive" alt="Image" width="100px">        
					</div>
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<h1>Sistem Informasi Belanja Tidak Langsung</h1>
					<h4>Badan Pengelolaan Keuangan dan Aset Daerah Kabupaten Tegal</h4>	
				</div>
			</div>
		</div>
	</div>
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><i class="fa fa-home"></i></a>
			</div>
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					{!! $menu !!}
				</ul>
				<ul class="nav navbar-nav navbar-right">
					@if(Auth::guest())
					<li><a href='{{url("login")}}'>Login</a></li>
					@else
					<li><a href='{{url("admin")}}'>Admin</a></li>

					@endif
				</ul>
			</div>
		</div>
	</nav>
	<div class="container">
		@yield('content')
	</div>
	<div class="container">
		<div class="row">
			<hr>
			<div class="col-lg-12">
				<center><p>This page took {{ (microtime(true) - LARAVEL_START) }} seconds to render</p></center>
				<div class="col-md-8">
					<p>Design by <a href="http://brilliansolution.com">Brillian Musyafa</a></p>
				</div>
				<div class="col-md-4">
					<p class="muted pull-right">© 2017 BPKAD Kabupaten Tegal. All rights reserved</p>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="modal-id">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Login</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ url('login') }}" id="login">
						{{ csrf_field() }}

						<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
							<label for="email" class="col-md-4 control-label">E-Mail Address</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

								@if ($errors->has('email'))
								<span class="help-block">
									<strong>{{ $errors->first('email') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
							<label for="password" class="col-md-4 control-label">Password</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control" name="password" required>

								@if ($errors->has('password'))
								<span class="help-block">
									<strong>{{ $errors->first('password') }}</strong>
								</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-8 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Login
								</button>

								<a class="btn btn-link" href="{{ url('password.request') }}">
									Forgot Your Password?
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- jQuery -->
	<script type="text/javascript" src="{{asset('js/jquery.min.js')}}"></script>
	<!-- Bootstrap JavaScript -->
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>

	<script type="text/javascript" src="{{asset('bootstrap-navbar/js/navbar.js')}}"></script>

	<!-- datatables -->
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/dataTables.buttons.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/buttons.flash.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/jszip.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/pdfmake.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/vfs_fonts.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/buttons.html5.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('bower_components/AdminLTE/plugins/datatables/extensions/Buttons/buttons.print.min.js')}}"></script>
	<script type="text/javascript">
		$('#datatables').DataTable({
			dom: 'Bfrtip',
			buttons: [
			'copyHtml5',
			'excelHtml5',
			'csvHtml5',
			'pdfHtml5'
			]
		});
	</script>
	@stack('scripts')

</body>
</html>
