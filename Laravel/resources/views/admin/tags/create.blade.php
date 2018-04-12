@extends('layouts.common.master')

@section('style')

{!! Html::style('css/select2.min.css') !!}


@endsection

@section('content')
    <div class="row">
        <div class="col-md-4 col-sm-4">
        	<h1>Add a new Tag they are begging for it</h1>

        	{!! Form::open(['action'=>'TagController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

            	<div class="form-group">
            		{{Form::label('tag_title',"Tag Title")}}
            		{{Form::text('tag_title','',['class'=>'form-control','placeholder'=>'Name of the new tag', 'spellcheck'=>'false'])}}
            	
                <br>
            	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                
        	{!! Form::close() !!}
         </div>
    </div>
@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection