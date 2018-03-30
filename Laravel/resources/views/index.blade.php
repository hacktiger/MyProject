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
	@if(count($game)>0)
		@foreach($game as $gamesInfo)
			<div class="well">
				<h3><a  href="/games/{{$gamesInfo->id}}">{{$gamesInfo->title}}</a></h3>
			</div>
		@endforeach
	@else
		<p> not found </p>
	@endif


	INDEX PAGE
	<br>
	<a href="games/create">Add games here</a>

	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	HAHAHHA
@endsection