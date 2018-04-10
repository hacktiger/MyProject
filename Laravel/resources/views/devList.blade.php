@extends('layouts.common.master')
@section('style')
  <title>Developers List</title>
  <style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  </style>
@endsection

@section('scripts')
  <script src="./js/bootstrap.min.js"></script>
@endsection

@section('content')
<div class="container">
	<table class="table">
		<tr>
			<td>logo</td>
			<td>Name</td>
			<td>Description? or smt</td>
			<td>Link to userPage</td>
		</tr>
	</table>
	</div>
@endsection