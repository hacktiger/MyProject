<!DOCTYPE html>
<html>
<head>
	<title>{{config('app.name', 'GameStop')}} | Admin Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	@yield('styles')
	@yield('scripts-top')
</head>
<body>
	@include('admin.common.sidenav')
	<section style="margin-left:240px; margin-top: 45px; margin-right: 45px;">
		<div class="container-fluid " >
			@yield('content')
		</div>
	</section>

</body>
@yield('scripts-bottom')
</html>