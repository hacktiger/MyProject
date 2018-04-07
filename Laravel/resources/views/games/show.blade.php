@extends('layouts.common.master')

@section('style')
@endsection

@section('content')

<div class="row">
	<!-- main content of game -->
	<section class="col-md-8 col-sm-8">
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

		<!-- upvote - downvote + report -->
		<div class="row">
			<!-- modal report -->
			<div class="col-sm-4 col-md-4">
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
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
								
								<form>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="report_1"> Impropriate contents
										</label>	<br><br>		
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="report_2"> Fraud
										</label> 	<br><br>
									</div>
									<div class="form-check">
										<label class="form-check-label">
											<input class="form-check-input" type="checkbox" name="report_3"> Pragarism
										</label>	<br><br>
									</div>
									<button type="submit" class="btn btn-danger">Submit Report</button>
								</form>
								
							</div>
						</div>
					</div>
				</div>
		</div>
	</section>

	<!-- A column on the right for game news or something-->
	<section class="col-md-4 col-sm-4">
	</section>
</div>


	@endsection


