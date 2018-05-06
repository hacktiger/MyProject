@extends('admin.admin')

@section('styles')
<style type="text/css">


</style>
@endsection

@section('content')
<div style="width: 60%"> 
{!! Form::open(['action'=>['TagController@update',$tag->id], 'method'=>'POST', 'class'=>'tag-form']) !!}
	<!-- TITLE -->
	<div class="form-group">
		{{Form::label('name',"Title")}}
		{{Form::text('name',$tag->name,['class'=>'form-control','placeholder'=>'Tag name', 'spellcheck'=>'false'])}}
	</div>

	{{Form::submit('Submit', ['class'=>'btn btn-block btn-primary',])}}
	{{Form::hidden('_method','PUT')}}
{!! Form::close() !!}
</div>
@endsection

@section('scripts')
<script type="text/javascript">
	$('#tag_manage').addClass('current-active');
</script>
@endsection