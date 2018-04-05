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
		<p style="overflow-wrap:break-word;">
			{{$game->description}}
		</p>
		
		<!--
			add tags here
		-->
		<div>
			@foreach($tags as $tags)
				<a href="{{$tags}}">{{$tags}}</a>
			@endforeach
		</div>

		<hr>
		<a href="/games/{{$game->title}}/edit" class="btn btn-default">Edit</a>

		<h4 class="" style="padding:20px">Uploaded by : {{Auth::user()->name}}</h4>
	</div>

	<!-- A column on the right for game news or something-->

</div>


@endsection


