@extends('layouts.common.master')

@section('style')
<style type="text/css">
</style>
@endsection

@section('content')
<div class="container">
	<h1>Top Games</h1>
	<table class="table border">
		<tbody>
			<tr>
				<td>Thumbnail</td>
				<td>Title</td>
				<td>Rating</td>
				<td>Developer</td>	
			</tr>
			<h2></h2>
			@foreach($game as $games)
			<tr  class="clickable-row hover-row" data-href="/games/{{$games->slug}}">
				<td><img style="width:180px;height: 60px" src="/storage/cover_images/{{$games->image}}"></td>
				<td>{{$games->title}}</td>
				<td>{{$games->avg_rating}} &ensp;<span class="fa fa-star" style="color:orange;"></span></td>
				<td>{{$games->upload_by}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</div>
@endsection