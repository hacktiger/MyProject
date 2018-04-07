@extends('layouts.common.master')

@section('style')
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-sm-8">
		<div style="height: 500px; width: inherit;">
			<img style="width: 100%; height: 100%; object-fit: contain" src="/storage/cover_images/{{$game->image}}">
		</div>
		<h1>{{$game->title}}</h1>
		<hr>
		<!-- tags -->
		<div class="tags"> 
		@foreach($game->tags as $tag)
			<span class="label label-default">{{ $tag->name}}</span>
		@endforeach
		</div>

		<p style="overflow-wrap:break-word;">
			{{$game->description}}
		</p>
		
		<!--
			add tags here
		-->
		

		<hr>
		@if(!Auth::guest())
		<!-- Remember to add && so only devs can do it -->
			@if(Auth::user()->id == $game->upload_by)
				<a class="btn btn-primary" href="/games/{{$game->title}}/edit" class="btn btn-default ">&ensp;Edit&ensp;</a>
				<hr>
				{!! Form::open(['action'=> ['GamesController@destroy', $game->title], 'method'=>'POST','class'=>'pull-right']) !!}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit('Delete', ['class'=>' btn btn-danger'])}}
				{!! Form::close() !!}
			@endif
		@endif

		<h4 class="" style="padding:20px">Uploaded by : {{Auth::user()->name}}</h4>
	</div>

	<!-- A column on the right for game news or something-->

</div>


@endsection


