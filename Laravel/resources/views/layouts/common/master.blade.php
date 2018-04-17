<!DOCTYPE html>
<html>
<head>
	<title>{{config('app.name', 'GameStop')}} | The Best Game Platform</title>
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
		.cus-header{
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
	<!-- header -->
	<!-- navigation bar -->
	@include('layouts.common.sidebar')
	
	<!--Page content-->
	<!-- Messages -->
	<section style="margin-left : 200px">	
	@include('inc.messages')
	</section>

	<!-- content yields here -->	
	<div class="main">
	<section class="container-fluid" >
	@yield('content')
	</section>
	</div>
	<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>

</body>



@yield('scripts');


</html>
