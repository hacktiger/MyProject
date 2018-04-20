<!DOCTYPE html>
<html>
<head>
	<title>{{config('app.name', 'GameStop')}} | Admin Page</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
	@yield('styles')
	@yield('scripts-head')
</head>
<body>
	@include('admin.common.sidenav')
	<section style="margin-left:240px; margin-top: 45px; margin-right: 45px;">
		<div class="w3-container w3-red" >
			<h1>aaaaaaaaaaaaaaa</h1>
		</div>
	</section>

</body>
@yield('scripts-bottom')
</html>