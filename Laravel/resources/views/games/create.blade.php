@extends('layouts.common.master')

@section('style')

{!! Html::style('css/select2.min.css') !!}


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

        <div class="form-group">
            {{Form::label('tag_id', 'Tags: ') }} <br>
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value='{{$tag->id}}'>{{$tag->name}}</option>
                @endforeach
            </select>
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

        <div class="form-group">
            {{Form::label('price',"Price")}}
            {{Form::text('price','',['class'=>'form-control','placeholder'=>'Give the price', 'spellcheck'=>'false'])}}
        </div>

        <div class="form-group">
            {{Form::label('sales',"Sales")}}
            {{Form::text('sales','',['class'=>'form-control','placeholder'=>'Give the price', 'spellcheck'=>'false'])}}
        </div>
        
       
        <!-- get user id add funct here-->
        <div class=" d-none form-group">       
            <input class="form-control" d-none" name="upload" value=" <?php echo $id=Auth::user()->id ?>">
        </div>
    

        


    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <br><br>

	{!! Form::close() !!}

@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
    </script>
@endsection