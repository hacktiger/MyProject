<?php
 
$dataPoints = array(
	array("x"=> 1, "y"=> $star[0]),
	array("x"=> 2, "y"=> $star[1]),
	array("x"=> 3, "y"=> $star[2]),
	array("x"=> 4, "y"=> $star[3]),
	array("x"=> 5, "y"=> $star[4]),

);
	
?>

@extends('layouts.common.master')
<title>Game Stop | {{  $game->title}}</title>

@section('style')
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: false,
	exportEnabled: false,
	theme: "light1", // "light1", "light2", "dark1", "dark2"
	title:{
		text: "This Game Overall Rating"
	},
	data: [{
		type: "bar", //change type to bar, line, area, pie, etc
		//indexLabel: "{y}", //Shows y value on all Data Points
		indexLabelFontColor: "#5A5757",
		indexLabelPlacement: "outside",   
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
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
<!-- FB ROOT For comments -->
<div id="fb-root"></div>
<script>

(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s); js.id = id;
	js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.12';
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>

<div class="row">
	<!-- main content of game -->
	<section class="col-md-8 col-sm-8">
		<div style="max-height: 417.6px ; max-width: 742.4px">
			<img  style="height: 100%; width: 100%; object-fit: contain;" alt="{{$game->title}}" src="/storage/cover_images/{{$game->image}}">
		</div> 

		<hr>

		<!-- Favorite -->
		<div class="row">
			<!-- title -->
			<div class="col-md-8 col-smd-4">
				<h1>{{$game->title}}</h1>
			</div>
			<!-- Favorite -->
			<div class="col-md-4 col-sm-4" style="margin-top:1%;"> 
				{!! Form::open(['action'=> ['MyController@favorite', $game->title], 'method'=>'POST', 'id'=>'favorite-form']) !!}
					<input type="text" class="d-none" name="favorite" value="0">	
					<button id="favorite" data-toggle="tooltip" data-placement="bottom" title="Set as Favorite !" class="fa fa-star cus-button"></button>
				{!! Form::close() !!}
			</div>
		</div>

		<hr>
		<!-- tags -->
		<div class="tags"> 
			<span>Game Tags : </span>
			@foreach($game_tags as $tag)
			<span class="label label-default"><a href="/allGames/{{$tag}}">{{$tag}}</a></span>
			@endforeach
		</div>
		<hr>
		<!-- Description -->
		<p style="overflow-wrap:break-word;">
			{!!$game->description!!}
		</p>
		<hr>
		<!-- uploader user name -->
		<h4 class="" style="padding:20px">Developer : {{$game->upload_by}}</h4>
		@if ($game->sales ==0)
		<h4 class="" style="padding:20px">Price : {{$game->price}}$</h4>
		@endif
		@if ($game->sales != 0)
		<h4 class="" style='padding:20px'>Price : <font color='gray'><s>{{$game->price}}$</s></font>  {{$game->price -$game->sales}}$</h4>
		@endif
		
		<!-- upvote - downvote + report -->
		<div class="row">
			<div class="col-sm-4 col-md-4">

				<!-- EDIT FUNCTION -->
				@if(Auth::user()->auth_level == 'admin' || Auth::user()->name == $game->upload_by)
				<!-- Remember to add && so only devs can do it -->
					<a class="btn btn-block" style="background-color: #4CAF50; color:white;" href="/games/{{$game->slug}}/edit">&ensp;Edit&ensp;</a>
			</div>
			<div class="col-sm-4 col-md-4">
				
					<!-- DELETE FUNCTION -->
					{!! Form::open(['action'=> ['GamesController@destroy', $game->title], 'method'=>'POST']) !!}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit('Delete', ['class'=>' btn btn-block btn-danger'])}}
					{!! Form::close() !!}
				
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
		<br>
		{{-- Show link if purchased  --}}
		@if($owned)
		<form action="http://{{$game->link}}">
			<button type="submit" class="btn btn-block btn-primary">Download</button>
		</form>
		@endif
		{{-- Show purchase option --}}
		@if(!$owned)
		<div class="col-sm-12 col-md-12">
				<button  type="button"  class="btn btn-block btn-primary" data-toggle="modal" data-target="#purchaseModal">
					Purchase
				</button>
				<!--the actual modal-->
				<div class="modal fade" id="purchaseModal">
					<div class="modal-dialog modal-md">
						<div class="modal-content">
							<!-- Modal Header -->
							<div class="modal-header">
								<h4 class="modal-title">Are you sure about this payment ?</h4>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<!-- Modal body -->
							<div class="modal-body">
								<!-- Price of game -->
								<h4>Your Wallet : {{Auth::user()->wallet}}$</h4>
								<h4>Game Price : {{$game->price}}$;</h4>
								<hr style="width: 70%;">
								<h4>Remaining &ensp;: {{Auth::user()->wallet-$game->price}}$</h4>
								<!-- FORM -->
								<br><br>
								{!! Form::open(['action'=> ['MyController@purchase', $game->title], 'method'=>'POST', 'id'=>'purchase-form']) !!}
								<input type="text" class="d-none" name="purchase" value="0">	
								<button id="purchase" data-toggle="tooltip" data-placement="bottom" title="Purchase Game" class="btn btn-block btn-primary">Purchase Game</button>
								{!! Form::close() !!}	
							</div>
						</div>
					</div>
				</div>
			</div>
		
		@endif

		<!-- user rating -->
		<div class="cus-box-sizing">
			<span class="heading">Your Rating</span>
			{!! Form::open(['action'=> ['MyController@rating', $game->title], 'method'=>'POST', 'id'=>'target']) !!}
			{{Form::text('rating','',['class'=>'form-control','placeholder'=>'Give the rating', 'value'=> '0' , 'class'=>'d-none'])}}
			<button id="1-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="2-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="3-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="4-star" class="fa fa-star cus-button" type="submit"></button>
			<button id="5-star" class="fa fa-star cus-button" type="submit"></button>
			{!! Form::close() !!}
			<?php  $sumStar = $star[0] + $star[1] + $star[2] + $star[3] + $star[4];
			if($sumStar !== 0){
				$pre_avg = ($star[0] + $star[1]*2 + $star[2]*3 + $star[3]*4 + $star[4]*5)/$sumStar; 
				$avg = round($pre_avg, 1, PHP_ROUND_HALF_UP);  
			} else {
				$avg = 0;
			}		  
				echo "<p>Average rating : <b>$avg</b> </p>"
			?>
			@if($sumStar !==0)

			<hr style="border:2px solid #f1f1f1">
			<div id="chartContainer" style="height: 330px; width: 100%;"></div>
			<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
		</div>
		@endif	
		<div class="fb-comments" data-href="https://gamestop.test/games/{{$game->title}}" data-width="700" data-numposts="5"></div>
	</section>
	
	<!-- A column on the right for game news or something-->
	<section class="col-md-4 col-sm-4">
	</section>
</div>

@endsection

@section('scripts')
<script type="text/javascript"> 
	
	<?php
		try {
			$phpVar = $rating->rating;
			echo "var rate = '{$phpVar}';";	
		} catch (Exception $e) {}

		try {
			$fav = $favorite;
			echo "var favo = '{$fav}';";			
		} catch (Exception $e) {}

		

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

	// Favorite function

	if(favo == '1'){
		$("#favorite").addClass("checked");	
		$("#favorite").click(function(){
			$("input:text").val("0");
		});
	} else {
		$("#favorite").click(function(){
			$("input:text").val("1");
		});
	}
</script>


@endsection


