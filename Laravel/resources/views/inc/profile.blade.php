@extends('layouts.common.master')

@section('style')



@section('style')

@endsection

@section('content')
	<p>Profile page</p>
	<h3>{{Auth::user()->name}}</h3>
	
@endsection