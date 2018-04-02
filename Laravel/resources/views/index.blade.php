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
@endsection


@section('content')
	
		@foreach($game as $gamesInfo)
			<div class="well">
				<h3><a  href="/games/{{$gamesInfo->title}}">{{$gamesInfo->title}}</a></h3>
			</div>
		@endforeach
		
		
		<div class="row">
			{{$game->links()}}
		</div>
		


	INDEX PAGE
	<br>
	<a href="games/create">Add games here</a>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	HAHAHHA
@endsection