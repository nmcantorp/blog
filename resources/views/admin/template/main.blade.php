<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> @yield('title','Default') | Panel de Administración</title>
    <link rel="stylesheet" type="text/css" href=" {{ asset('plugins/bootstrap/css/bootstrap.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/master.css') }} ">
</head>
<body>
	@include('admin/template/partials/nav')
	<div class="container">
		@include('flash::message')
		@include('admin/template/partials/errors')

		@yield('content')
	</div>

	@include('admin/template/partials/footer')
	
	<script src="{{ asset('plugins/jquery/js/jquery-2.2.3.js') }}" type="text/javascript" charset="utf-8"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.js') }}" type="text/javascript" charset="utf-8"></script>
</body>
</html>