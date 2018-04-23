@extends('admin.admin')

@section('styles')
<style type="text/css">
table {
	font-family: arial, sans-serif;
	border-collapse: collapse;
	width: 80%;
}

td, th {
	border: 1px solid #dddddd;
	padding: 5px;
	text-align: center
}

tr:nth-child(even) {
	background-color: #dddddd;
}

</style>
@endsection

@section('content')

<!-- prints out every tags -->
<div class="col col-group">
	<div class="col-md-8 col-sm-8">
		<h1>Tag Search</h1>
		<div>
			{!! Form::open(['action'=>"SearchController@tagSearch", 'method' =>'POST'])!!}
				<div class = 'form-group'>
					{{Form::text('tag', '',['class'=>'form-control', 'placeholder'=>'...'])}}
				</div>
				{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
				{!!Form::close()!!}
			</div>
		<table class="table table-sm table-hove">
			<thead class="thead-dark">
				<tr>
					<th>Tag Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>

			<tbody>
				@foreach($tag as $tags)
				<tr>
					<th><a href="/tags/{{$tags->id}}">{{$tags->name}}</a></th>
					<th><a class="btn" style="background-color: #4CAF50; color:white;" href="/tags/{{$tags->id}}/edit">&ensp;Edit&ensp;</a></th>
					<th>{!! Form::open(['action'=> ['TagController@destroy', $tags->id], 'method'=>'POST']) !!}
					{{Form::hidden('_method', 'DELETE')}}
					{{Form::submit('Delete', ['class'=>' btn  btn-danger'])}}
					{!! Form::close() !!}</th>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="col-md-4 card" >
		<h3 style="padding-top: 10px;">Add new Tags !!</h3>

		{!! Form::open(['action'=>'TagController@store', 'method'=>'POST', 'class'=>'tag-form']) !!}
		<!-- TITLE -->
		<div class="form-group">
			{{Form::label('name',"Title")}}
			{{Form::text('name','',['class'=>'form-control','placeholder'=>'Tag name', 'spellcheck'=>'false'])}}
		</div>

		{{Form::submit('Submit', ['class'=>'btn btn-block btn-primary',])}}
		<br>
		{!! Form::close() !!}
	</div>
</div>
@endsection