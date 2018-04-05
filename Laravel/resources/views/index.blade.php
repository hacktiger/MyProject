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
		

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
@endsection