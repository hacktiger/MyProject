@extends('layouts.common.master')

@section('content')
<h1>All the tags</h1>

@foreach($tags as $tags)
	<div class="well">
		<h3>{{$tags->name}}</h3>
	</div>
@endforeach
@endsection