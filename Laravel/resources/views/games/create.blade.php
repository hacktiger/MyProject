@extends('layouts.common.master')

@section('style')

{!! Html::style('css/select2.min.css') !!}


@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">
	<h1>Share your games now !!</h1>
            <!-- Additional macros -->

	{!! Form::open(['action'=>'GamesController@store', 'method'=>'POST','enctype'=>'multipart/form-data']) !!}
        <!-- TITLE -->
    	<div class="form-group">
    		{{Form::label('title',"Title")}}
    		{{Form::text('title','',['class'=>'form-control','placeholder'=>'Title', 'spellcheck'=>'false'])}}
    	</div>
        <!-- DES -->
    	<div class="form-group">
    		{{Form::label('description',"Description")}}
    		{{Form::textarea('description','',['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'Describe the Game', 'spellcheck'=>'false'])}}
    	</div> 
        <div class="form-group">
            {{Form::label('upload_by',"Developer Name")}}
            {{Form::text('upload_by',$userName,['class'=>'form-control','placeholder'=>'Give the developer name', 'spellcheck'=>'false'])}}
        </div>

        <div class="form-group">
            {{Form::label('release',"Release Year")}}
            {{Form::text('release','',['class'=>'form-control','placeholder'=>'Give the release year', 'spellcheck'=>'false'])}}
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
            {{Form::label('sales',"Promotion Price")}}
            {{Form::text('sales','',['class'=>'form-control','placeholder'=>'Give the sales price', 'spellcheck'=>'false'])}}
        </div>

    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <br><br>

	{!! Form::close() !!}
    </div>
</div>

@endsection

@section('scripts')
    {!! Html::script('js/select2.min.js') !!}

    <script type="text/javascript">
        $('.select2-multi').select2();
        $('#upload_game').addClass('current-active');
        $('#main,#profile_manage,#game_manage,#game_report,#tag_manage').removeClass('current-active');
    </script>
@endsection