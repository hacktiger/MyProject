@extends('admin.admin')

@section('styles')
<style type="text/css">


</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">
	<h1>Notice to Users</h1>
	{!! Form::open(['action'=>['NotificationController@update',$notification->id], 'method'=>'POST','enctype'=>'multipart/form-data']) !!}

        <div class="form-group">
            {{Form::label('title',"What is the title of the notice")}}
            {{Form::textarea('title',$notification->title,['class'=>'form-control','placeholder'=>'Title here', 'spellcheck'=>'false'])}}
        </div> 
        <!-- DES -->
    	<div class="form-group">
    		{{Form::label('text',"Write about the Notice")}}
    		{{Form::textarea('text',$notification->text,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'What is the notice about', 'spellcheck'=>'false'])}}
    	</div> 

    	{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
        <br><br>
    {{Form::hidden('_method','PUT')}}
	{!! Form::close() !!}
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#notification').addClass('current-active');
</script>
@endsection