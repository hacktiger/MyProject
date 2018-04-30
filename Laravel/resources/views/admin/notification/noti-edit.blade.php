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
        <!-- DES -->
    	<div class="form-group">
    		{{Form::label('text',"Write about the Notice")}}
    		{{Form::textarea('text',$notification->text,['id'=>'article-ckeditor','class'=>'form-control','placeholder'=>'What is the notice about', 'spellcheck'=>'false'])}}
    	</div> 

        <!-- link to images -->
        <div class="form-group">
            {{Form::label('image',"Upload an image with it")}}
            {{Form::file('image')}}
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