@extends('layouts.common.master')

@section('style')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<style type="text/css">
</style>
@endsection

@section('content')
<div class="row">
	<div class="col-md-8">
		<h2 style="text-align: center;">TOP GAMES CURRENTLY</h2>
		<br>
		<!-- will make look better with time -->
		@foreach($top_1 as $top_1)
		<div class="well container-image" style="position: relative;">
			<i class="fa fa-star" style="position: absolute; left: 0; top:15px;"></i>
	   		<h3 ><a  href="/games/{{$top_1->slug}}">{{$top_1->game_title}}</a></h3>
	  	</div>
		@endforeach
	  	@foreach($top_2 as $top_2)
	  	<div class="well">
	   		<h3><a  href="/games/{{$top_2->slug}}">{{$top_2->game_title}}</a></h3>
	  	</div>
	  	@endforeach
	  	@foreach($top_3 as $top_3)
	  	<div class="well">
	   		<h3><a  href="/games/{{$top_3->slug}}">{{$top_3->game_title}}</a></h3>
	  	</div>
	  	@endforeach
	  	<!-- the other 7 games -->
		@foreach($game as $games)
		<div class="well">
	   		<h3><a  href="/games/{{$games->slug}}">{{$games->game_title}}</a></h3>
	  	</div>
		@endforeach
	</div>
</div>
@endsection