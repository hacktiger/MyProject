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
	 
		@foreach($user as $users)
		<tr>
			<td><img src="{{$users->avatar}} "style ="width:25% height:25%"></td>
			<td><a href = "/profile/{{$users->id}}">{{$users->name}}</a></td>
			<td>{!!$users->description!!}</td>
			<td>{{$users->id}}</td>
		</tr>
		@endforeach
		{{$user->links()}}
	</tbody>
</table>
@endsection