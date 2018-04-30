@extends('admin.admin')

@section('styles')
<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

td, th {
    padding: 2px;
    text-align: center
}
thead {
    background-color: #7386D5;
    color:white;
}
.content:hover{
    background-color: #ebeef9;
}


</style>
@endsection
@section('content')

<div class="row">
	<div class="col-md-8 col-sm-12">
	    <table class="table table-sm table-hover">
            <thead >
                <tr>
                    <th>Id</th>
                    <th>Info</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            @foreach($notification as $noti)
            <tbody>
                <tr class="content">
                    <th>{{$noti->id}}</th>
                    <th><?php $string = $noti->text; $sub = substr($string,0,12); echo $sub;?></th>
                    <th><a class="btn" style="background-color: #4CAF50; color:white;" href="/notification/{{$noti->id}}/edit">&ensp;Edit&ensp;</a></th>
                    <th>{!! Form::open(['action'=> ['NotificationController@destroy', $noti->id], 'method'=>'POST']) !!}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit('Delete', ['class'=>' btn  btn-danger'])}}
					{!! Form::close() !!}</th>
                </tr>
            </tbody>
            @endforeach
        </table>
        {{$notification->links()}}
	</div>
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