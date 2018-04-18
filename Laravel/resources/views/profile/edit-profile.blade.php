@extends('layouts.common.master')

@section('style')
@endsection

@section('content')
	<h1>Edit Games</h1>
            <!-- Additional macros -->

	{!! Form::open(['action'=>['ProfileController@update',$user->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

    	<div class="form-group">
    		{{Form::label('name',"Change your name here")}}
    		{{Form::text('name',$user->name,['class'=>'form-control','placeholder'=>'New name', 'spellcheck'=>'false'])}}
    	</div>
    	<div class="form-group">
    		{{Form::label('description',"Description")}}
    		{{Form::textarea('description',$user->description,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Give a brief description of yourself', 'spellcheck'=>'false'])}}
    	</div>
        <!-- Avatar -->      
        <div class="form-group">
            {{Form::label('avatar',"Please Re-Upload your avatar here")}}
            {{Form::file('avatar')}}
        </div>
        {{Form::hidden('_method','PUT')}}
    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <br><br>

	{!! Form::close() !!}
@endsection

@section('scripts')
@endsection