@extends('layouts.common.master')

@section('style')
@endsection

@section('content')

@foreach($Adventure as $Adventure)
	<div class="well">
		<a href="/games/{{$Adventure->title}}"> {{$Adventure->title}}</a>
	</div>
@endforeach


@endsection