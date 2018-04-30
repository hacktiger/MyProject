@extends('admin.admin')

@section('styles')
<style type="text/css">


</style>
@endsection
@section('content')

<div class="row">
@foreach($notification as $noti)
	<div class="col-md-8 col-sm-12">
	    <!-- TODO :get only first few characters -->
	    <h3>{{$noti->text}}</h3>
	    <a class="btn" style="background-color: #4CAF50; color:white;" href="/notification/{{$noti->id}}/edit">&ensp;Edit&ensp;</a>

		{!! Form::open(['action'=> ['NotificationController@destroy', $noti->id], 'method'=>'POST']) !!}
			{{Form::hidden('_method', 'DELETE')}}
			{{Form::submit('Delete', ['class'=>' btn  btn-danger'])}}
		{!! Form::close() !!}
			
	</div>
@endforeach
	<div class="col-md-4 card col-sm-12" >
		<h3 style="padding-top: 10px; margin-left: 10%;">Create a new Notification !!</h3>
		<a href="{{route('notification.create')}}"><button type="submit" class="btn btn-primary btn-block">Add Notification</button></a>
	</div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#notification').addClass('current-active');
    $('#main,#profile_manage,#wallet_history,#sales_log,#upload_game,#game_report,#tag_manage,#game_manage').removeClass('current-active');
</script>
@endsection