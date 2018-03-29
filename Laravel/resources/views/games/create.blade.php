@extends('layouts.common.master')

@section('style')



@section('style')

@endsection

@section('content')
	<h1>create games</h1>
	{!! Form::open(['action'=>'GamesController@store', 'method'=>'POST']) !!}
    	<div class="form-group">
    		{{Form::label('title',"Title")}}
    		{{Form::text('title','',['class'=>'form-control','placeholder'=>'Title', spellcheck="false"/])}}
    	</div>
    	<div class="form-group">
    		{{Form::label('description',"Description")}}
    		{{Form::text('description','',['class'=>'form-control','placeholder'=>'Give a brief description of the game', spellcheck="false"/])}}
    	</div>

    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}

	<p>hey</p>
@endsection