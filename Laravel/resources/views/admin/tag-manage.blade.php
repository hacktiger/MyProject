@extends('admin.admin')

@section('styles')
<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

td, th {
    padding: 2px;
    text-align: center
}
thead {
    background-color: #7386D5;
    color:white;
}
.content:hover{
    background-color: #ebeef9;
}

</style>
@endsection

@section('content')

<!-- prints out every tags -->
<div class="row">
	<div class="col-md-8 ">
		<h1>Tag Search</h1>
		<div>
			{!! Form::open(['action'=>"SearchController@tagSearch", 'method' =>'POST'])!!}
				<div class = 'form-group'>
					{{Form::text('tag', '',['class'=>'form-control', 'placeholder'=>'...'])}}
				</div>
				{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
				{!!Form::close()!!}
			</div>
			<br><br>
		<table class="table table-sm ">
			<thead >
				<tr>
					<th>Tag Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>

			<tbody>
				@foreach($tag as $tags)
				<tr class="content">
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
		{{$tag->links()}}
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

@section('scripts')
    <script type="text/javascript">
        $('#tag_manage').addClass('current-active');
    </script>
@endsection