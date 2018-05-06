@extends('layouts.common.master')
@section('style')
<style type="text/css">
.hover-row:hover{
	background-color: #f2f2f2;
	cursor: pointer;
}
tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
@endsection


@section('content')

<div class="container">
	<h3>Navigation</h3>
	<table class="table borderless">
		<thead>
		<tr class ="success">
			@foreach($tags as $tag)
			<td><a href="/tags/{{$tag->id}}">{{$tag->name}}</td>
			@endforeach
		</tr>
		</thead>
	</table>
</div>
<div class="container">
	<h1>{{$page_title}}</h1>
	<p>{{$page_desc}}</p>
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

	{{ $game->links() }}
</div>

@endsection

@section('scripts')
<script type="text/javascript">
	$(document).ready(function(){
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
	});
</script>
@endsection