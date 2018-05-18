@extends('layouts.common.master')
@section('style')
<style type="text/css">
.hover-row {
	transition: transform .4s;
}
.hover-row:hover{
	background-color: #f2f2f2;
	cursor: pointer;
	-ms-transform: scale(1.05); /* IE 9 */
    -webkit-transform: scale(1.05); /* Safari 3-8 */
    transform: scale(1.05); 
}
tr:nth-child(even) {
    background-color: #dddddd;
}
.success td:hover {
	color: black ;
	font-weight: bolder;
}
</style>
@endsection


@section('content')

<div class="container" style="width: 90%;">
	<h3>Tag Navigation</h3>
	<!-- 5 example TAGS -->
	<table class="table borderless">
		<thead>
		<tr class ="success">
			@foreach($display_tags as $tag)
			<td><a href="/tags/{{$tag->id}}">{{$tag->name}}</a></td>
			@endforeach
		</tr>
		</thead>
	</table>
</div>
<!-- DROP DOWN OF ALL TAGS -->
<div class="container" style="margin-left: 5%;">                                          
  <div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">All Tags
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
    	@foreach($display_tags as $tag)
			<li><a href="/tags/{{$tag->id}}">{{$tag->name}}</a></li>
		@endforeach
    </ul>
  </div>
</div>


<!-- games with tags -->
<div class="container" style="width: 90%">
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
	// making the row clickable 
	$(document).ready(function(){
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
	});

	// get the currently active page (because this is a common view for many funcs)
	<?php 
		if($page_title == 'All Games'){
			$page_id = 'all_games';
			echo "var page_id_js = '{$page_id}';";	
		} elseif ($page_title == 'Top Games'){
			$page_id = 'top_games';
			echo "var page_id_js = '{$page_id}';";	
		}elseif ($page_title == 'Most Purchased') {
			$page_id = 'most_downloads';
			echo "var page_id_js = '{$page_id}';";			
		}
	?>

	if(typeof page_id_js !== 'undefined'){
		$('#'+page_id_js).addClass('current-active');
	}
</script>
@endsection