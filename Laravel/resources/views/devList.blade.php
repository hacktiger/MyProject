@extends('layouts.common.master')
@section('style')
  <title>Developers List</title>
 
@endsection

@section('content')
<table class="table table-striped">
	<thead>
			<tr>
					<th>Logo</th>
					<th>Name</th>
					<th>Bio</th>
					<th>ID</th>
			</tr>
	</thead>
	<tbody>
		@foreach($user as $user)
		<tr>
			<td><img src="{{$user->avatar}} "style ="width:25% height:25%"></td>
			<td><a href = "/profile/{{$user->id}}">{{$user->name}}</a></td>
			<td>{{$user->description}}</td>
			<td>{{$user->id}}</td>
		</tr>
		@endforeach
	</tbody>
@endsection