@extends('layouts.common.master')

@section('style')



@section('style')

@endsection

@section('content')
	<h1>Share your games now !!</h1>
            <!-- Additional macros -->

	{!! Form::open(['action'=>'GamesController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

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
            {{Form::label('image',"Upload your image here")}}
            {{Form::file('image')}}
        </div>

        {{ Form::checkbox('FPS', 'FPS') }} First Person Shooter<br>
        {{ Form::checkbox('Adventure', 'Adventure') }}  Adventure<br>
        {{ Form::checkbox('RPG', 'RPG') }}              RPG<br>
        {{ Form::checkbox('Action', 'Action') }}        Action<br>
        {{ Form::checkbox('Puzzle', 'Puzzle') }}        Puzzle<br>
        {{ Form::checkbox('Strategy', 'Strategy') }}    Strategy<br><br>

        <!-- get user id -->
        <div class=" d-none form-group">       
            <input class="form-control" d-none" name="upload" value=" <?php echo $id=Auth::user()->id ?>">
        </div>



    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <br><br>

	{!! Form::close() !!}

@endsection