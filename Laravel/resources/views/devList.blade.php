@extends('layouts.common.master')
@section('style')
  <title>Developers List</title>
 
@endsection

@section('content')
<table class="table">
	<thead>
	  <tr>
		<th scope="col">Logo</th>
		<th scope="col">Username</th>
		<th scope="col">Description</th>
		<th scope="col">ID</th>
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
</table>
@endsection