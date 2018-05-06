@extends('layouts.common.master')

@section('style')
@endsection

@section('scripts')
@endsection

@section('content')
<div class = 'row'>
	<div class="col-md-8 col-sm-12"> 
		<h4>{{Auth::user()->name}}`s Purchase History</h4>
	</div>

	<div class="col-md-4 col-sm-12">
		<div><p>Our contace info : hacktiegr1989@gmail.com</p></div>
	</div>
</div>
@endsection