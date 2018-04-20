@extends('admin.admin')

@section('styles')
@endsection

@section('content')

<!-- prints out every tags -->
@foreach($result as $results)
	<div class="well">
		<h1>{{$result}}</h1>
	</div>
@endforeach
@endsection