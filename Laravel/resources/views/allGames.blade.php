@extends('layouts.common.master')
@section('style')
  <title>Game Database</title>
  <style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  </style>
@endsection


@section('content')

<div class="container">
	<h3>Navigation</h3>
	<table class="table borderless">
	<thead>
	<tr class ="success">
		<td><a href="#Action">Action</td>
		<td><a href="#Adventure">Adventure</td>
		<td><a href="#FPS">FPS</td>
		<td><a href="#Strategy">Strategy</td>
		<td><a href="#Puzzle">Puzzle</td>
	</tr>
	</thead>
	</table>
</div>
<div class="container">
	<h3>All Games</h3>
	<table class="table border">
	<tbody>
		<tr>
			<td>Thumbnail</td>
			<td>Title</td>
			<td>Rating</td>
			<td>Developer</td>
			
		</tr>

		@foreach($game as $games)
		<tr>
			<td><img style="width:180px;height: 60px" src="/storage/cover_images/{{$games->image}}"></td>
			<td><a  href="/games/{{$games->title}}">{{$games->title}}</a></td>
			<td>{{$games->average_rating}}</td>
			<td>{{$games->upload_by}}</td>
		</tr>
		@endforeach



	</tbody>
	</table>
</div>



@endsection