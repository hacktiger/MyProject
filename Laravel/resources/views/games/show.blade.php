@extends('layouts.common.master')
<title>Game Stop | {{  $game->title}}</title>
@section('style')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.cus-box-sizing {
	box-sizing: border-box;
	font-family: Arial;
	margin: 0 auto; /* Center website */
	max-width: 800px; /* Max width */
	padding: 20px;
}


.heading {
	font-size: 25px;
	margin-right: 25px;
}

.fa {
	font-size: 25px;
}

.checked {
	color: orange;
}

/* Three column layout */
.side {
	float: left;
	width: 15%;
	margin-top:10px;
}

.middle {
	margin-top:10px;
	float: left;
	width: 70%;
}

/* Place text to the right */
.right {
	text-align: right;
}

/* Clear floats after the columns */
.cus-row:after {
	content: "";
	display: table;
	clear: both;
}

/* The bar container */
.bar-container {
	width: 100%;
	background-color: #f1f1f1;
	text-align: center;
	color: white;
}

/* Individual bars */
.bar-5 {width: 50%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

.cus-button {
	background-color: Transparent;
	background-repeat:no-repeat;
	border: none;
	cursor:pointer;
	overflow: hidden;
	outline:none;
}
</style>

@endsection

@section('content')

<div class="row">
	<!-- main content of game -->
	<section class="col-md-8 col-sm-8">
		<div style="height: 500px; width: inherit;">
			<img style="width: 100%; height: 100%; object-fit: contain" src="/storage/cover_images/{{$game->image}}">
		</div> 

		<hr>

		<!-- Favorite -->
		<div class="row">
			<!-- title -->
			<div class="col-md-8 col-smd-4">
				<h1>{{$game->title}}</h1>
			</div>
			<!-- favorite -->
			<div class="col-md-4 col-sm-4" style="margin-top:1%;"> 
				{!! Form::open(['action'=> ['MyController@favorite', $game->title], 'method'=>'POST']) !!}
					{{Form::text('favorite','',['class'=>'form-control','placeholder'=>'favorite', 'value'=> '0' , 'class'=>'d-none'])}}		
					<button data-toggle="tooltip" data-placement="bottom" title="Set as Favorite !" id="favorive" class="fa fa-star cus-button" type="submit"></button>
				{!! Form::close() !!}
			</div>
		</div>

		<hr>
		<!-- tags -->
		<div class="tags"> 
			@foreach($game->tags as $tag)
			<span class="label label-default">{{ $tag->name}}</span>
			@endforeach
		</div>
		<!-- Description -->
		<p style="overflow-wrap:break-word;">
			{{$game->description}}
		</p>
		<hr>
		<!-- uploady user name -->
		<h4 class="" style="padding:20px">Uploaded by : {{Auth::user()->name}}</h4>

		<!-- upvote - downvote + report -->
		<div class="row">
			<div class="col-sm-4 col-md-4">
				<!-- EDIT FUNCTION -->
				@if(!Auth::guest())
				<!-- Remember to add && so only devs can do it -->
				@if(Auth::user()->id == $game->upload_by && Auth::user()->authority !== 'casual')
				<a class="btn btn-block btn-primary" href="/games/{{$game->title}}/edit">&ensp;Edit&ensp;</a>
			</div>
			<div class="col-sm-4 col-md-4">
				<!-- DELETE FUNCTION -->
				{!! Form::open(['action'=> ['GamesController@destroy', $game->title], 'method'=>'POST']) !!}
				{{Form::hidden('_method', 'DELETE')}}
				{{Form::submit('Delete', ['class'=>' btn btn-block btn-danger'])}}
				{!! Form::close() !!}
				@endif
				@endif
			</div>
			<!-- modal report -->
			<div class="col-sm-4 col-md-4">
				<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal">
					Report
				</button>

				<!--the actual modal-->
				<div class="modal fade" id="myModal">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Report This Game</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<!-- FORM -->
								
								{!! Form::open(['action'=> ['MyController@report', $game->title], 'method'=>'POST']) !!}

								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="report_1" value="Impropriate"> Impropriate contents
									</label>	<br><br>		
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="report_2"> Fraud
									</label> 	<br><br>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" name="report_3"> Plagarism
									</label>	<br><br>
								</div>
								<div class="form-group">
									<textarea name="text" class="form-control" rows="5" placeholder="Add further description"></textarea>
								</div>
								<button type="submit" class="btn btn-block btn-danger">Submit Report</button>
								{!! Form::close() !!}
								
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- user rating -->
		<div class="cus-box-sizing">
			<span class="heading">User Rating</span>
			{!! Form::open(['action'=> ['MyController@rating', $game->title], 'method'=>'POST', 'id'=>'target']) !!}
			{{Form::text('rating','',['class'=>'form-control','placeholder'=>'Give the rating', 'value'=> '0' , 'class'=>'d-none'])}}
			<button id="1-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="2-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="3-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="4-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="5-star" class="fa fa-star cus-button" type="submit"></button>
			{!! Form::close() !!}
			<p># votes based on # of users</p>
			<hr style="border:3px solid #f1f1f1">

			<div class="cus-row">
				<div class="side">
					<div>5 star</div>
				</div>
				<div class="middle">
					<div class="bar-container">
						<div class="bar-5"></div>
					</div>
				</div>
				<div class="side right">
					<div>52</div>
				</div>
				<div class="side">
					<div>4 star</div>
				</div>
				<div class="middle">
					<div class="bar-container">
						<div class="bar-4"></div>
					</div>
				</div>
				<div class="side right">
					<div>63</div>
				</div>
				<div class="side">
					<div>3 star</div>
				</div>
				<div class="middle">
					<div class="bar-container">
						<div class="bar-3"></div>
					</div>
				</div>
				<div class="side right">
					<div>15</div>
				</div>
				<div class="side">
					<div>2 star</div>
				</div>
				<div class="middle">
					<div class="bar-container">
						<div class="bar-2"></div>
					</div>
				</div>
				<div class="side right">
					<div>6</div>
				</div>
				<div class="side">
					<div>1 star</div>
				</div>
				<div class="middle">
					<div class="bar-container">
						<div class="bar-1"></div>
					</div>
				</div>
				<div class="side right">
					<div>20</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- A column on the right for game news or something-->
	<section class="col-md-4 col-sm-4">
	</section>
</div>
@endsection

@section('scripts')


<script type="text/javascript"> 
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	}); 

	<?php
	try {
		$phpVar = $rating->rating;
		echo "var rate = '{$phpVar}';";
	} catch (Exception $e) {
	}
	?>
	if(rate == '1'){
		$("#1-star").addClass("checked");
	}	
	if(rate == '2'){
		$("#1-star").addClass("checked");
		$("#2-star").addClass("checked");	
	}	
	if(rate == '3'){
		$("#1-star").addClass("checked");
		$("#2-star").addClass("checked");
		$("#3-star").addClass("checked");
	}
	if(rate == '4'){
		$("#1-star").addClass("checked");
		$("#2-star").addClass("checked");
		$("#3-star").addClass("checked");
		$("#4-star").addClass("checked");
	}
	
	if(rate == '5'){
		$("#1-star").addClass("checked");
		$("#2-star").addClass("checked");
		$("#3-star").addClass("checked");
		$("#4-star").addClass("checked");
		$("#5-star").addClass("checked");
	}

	$("#1-star").click(function(){
		$("input:text").val("1");
	});            
	$("#2-star").click(function(){
		$("input:text").val("2");   
	});
	$("#3-star").click(function(){
		$("input:text").val("3");
	});
	$("#4-star").click(function(){
		$("input:text").val("4");	     
	});
	$("#5-star").click(function(){
		$("input:text").val("5");

	});
	// JQuery for the favorite	
	<?php
	try {
		$fav = $favorite->id;
		echo "var favo = '{$fav}';";
	} catch (Exception $e) {

	}
	?>

	$("#favorite").click(function(){
		$("input:text").val("1");
	});
	// Still needs fixing
	if(favo !== 'null'){
		$("#favorite").addClass("checked");
	}
</script>
@endsection


