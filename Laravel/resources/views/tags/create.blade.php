@extends('layouts.common.master')

@section('style')

<style type="text/css">
	.tag-form{
		width: 30%;
	}
</style>


@endsection

@section('content')
	<h1>Add new Tags !!</h1>

	{!! Form::open(['action'=>'TagController@store', 'method'=>'POST', 'class'=>'tag-form']) !!}
        <!-- TITLE -->
    	<div class="form-group">
    		{{Form::label('name',"Title")}}
    		{{Form::text('name','',['class'=>'form-control','placeholder'=>'Tag name', 'spellcheck'=>'false'])}}
    	</div>
        

    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <br><br>

	{!! Form::close() !!}

@endsection

@section('scripts')
    
@endsection