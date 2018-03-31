@extends('layouts.common.master')

@section('style')



@section('style')

@endsection

@section('content')
	<h1>create games</h1>
	{!! Form::open(['action'=>'GamesController@store', 'method'=>'POST']) !!}
    	<div class="form-group">
    		{{Form::label('title',"Title")}}
    		{{Form::text('title','',['class'=>'form-control','placeholder'=>'Title', 'spellcheck'=>'false'])}}
    	</div>
    	<div class="form-group">
    		{{Form::label('description',"Description")}}
    		{{Form::text('description','',['class'=>'form-control','placeholder'=>'Give a brief description of the game', 'spellcheck'=>'false'])}}
    	</div>
        <!-- link to download -->
        <div class="form-group">
            {{Form::label('link',"Download Link")}}
            {{Form::text('link','',['class'=>'form-control','placeholder'=>'Give the download link here', 'spellcheck'=>'false'])}}
        </div>
        <!-- link to images -->
        <div class="form-group">
            {{Form::label('image',"Game Image")}}
            {{Form::text('image','',['class'=>'form-control','placeholder'=>'Give your game representing picture', 'spellcheck'=>'false'])}}
        </div>


        <div class=" d-none form-group">
            <label> Upload </label>
            <input class="form-control" d-none" name="upload" value="<?php echo $id=Auth::user()->id ?>">
        </div>

    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
	{!! Form::close() !!}

	<p>hey</p>
@endsection