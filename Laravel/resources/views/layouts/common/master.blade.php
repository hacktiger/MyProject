<!DOCTYPE html>
<html>
<head>
	<title>{{config('app.name', 'GameStop')}} | The Best Game Platform'</title>
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

	@yield('style')

	<style type="text/css">
		.header{
			background-color: white;
			height: 120px;
		}
		.footer{
			height: 120px;
		}
		.dropdown:hover>.dropdown-menu {
			display: block;
		}
		.dropdown-toggle::after {
			display:none
		}
	</style>

</head>
<body>
	<header class="header">
		<div class="float-right ">
			<a href="layouts.register.blade.php">Register</a>
		</div>

	</header>
	<!-- navigation bar -->

	@include('layouts.common.navbar')

	<section >	
	@include('inc.messages')
	@yield('content')
	</section>
	<footer class="footer bg-dark fixed-bottom">

	</footer>
</body>

</html>
