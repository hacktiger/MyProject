@extends('layouts.common.master')

@section('style')
<style type="text/css">


</style>
@endsection
@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>{{$notification->title}}</h2>
		<p>{{$notification->text}}</p>
	</div>
</div>


@endsection

@section('scripts')

@endsection