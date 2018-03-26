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


	</header>
	<!-- navigation bar -->

	<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
		<a class="navbar-brand" href="/">Logo</a>
		 <!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"> 
			<span class="navbar-toggler-icon"></span> 
		</button>

	 	 <!-- Navbar links -->
	 	<div class="collapse navbar-collapse" id="collapsibleNavbar">
	   		<ul class="navbar-nav">
	     		<li class="nav-item dropdown">
	      			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Dropdown 1</a>
			      	<div class="dropdown-menu">
				        <a class="dropdown-item" href="#">Link 1</a>
				        <a class="dropdown-item" href="#">Link 2</a>
				        <a class="dropdown-item" href="#">Link 3</a>
			      	</div>
	   			</li>

	     		<li class="nav-item dropdown">
	      			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Dropdown 2</a>
			      	<div class="dropdown-menu">
				        <a class="dropdown-item" href="#">Link 1</a>
				        <a class="dropdown-item" href="#">Link 2</a>
				        <a class="dropdown-item" href="#">Link 3</a>
			      	</div>
	   			</li>

	   			<li class="nav-item dropdown">
	      			<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Dropdown 3</a>
			      	<div class="dropdown-menu">
				        <a class="dropdown-item" href="#">Link 1</a>
				        <a class="dropdown-item" href="#">Link 2</a>
				        <a class="dropdown-item" href="#">Link 3</a>
			      	</div>
	   			</li>
	    	</ul>
	  	</div> 

	  	<form class="form-inline" action="">
	    	<input class="form-control mr-sm-2" type="text" placeholder="Search" name="Search">
	    	<button class="btn btn-success" type="submit">Search</button>
	  	</form>
	</nav>

	@yield('content')


	<footer class="footer bg-dark">

	</footer>
</body>

</html>
