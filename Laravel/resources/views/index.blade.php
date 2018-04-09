@extends('layouts.common.master')

@section('style')
<style type="text/css">
	a:link{
		text-decoration: none;
	}

	a:hover{
		color: red;
	}
</style>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')
		INDEX PAGE
		<!-- prints out every game -->
		@foreach($game as $gamesInfo)
			<div class="well">
				<h3><a  href="/games/{{$gamesInfo->title}}">{{$gamesInfo->title}}</a></h3>
			</div>
		@endforeach
		
		
		<div class="row">
			{{$game->links()}}
		</div>
		<br>
		<h1><center>Ongoing Sales</center></h1>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="https://i.imgur.com/qQIbhnJ.png" style="width:100%;">
		  <div class="carousel-caption d-none d-md-block">
				<h3><font color=black> Developer Sale: Square Enix</font></h3>
			</div>
      </div>

      <div class="item">
        <img src="https://i.imgur.com/5keALkN.png" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="https://i.imgur.com/cz8Cxmr.png" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

@endsection