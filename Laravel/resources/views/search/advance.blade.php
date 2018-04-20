@extends ('layouts.common.master')

@section ('content')

<h1> Advance Search</h1>

{{--  {!! Form::open(['action'=>['SearchController@advancedSearch'], 'method' =>'POST', 'enctype'=>'multipart/form-data'])!!}


{{Form::hidden('_method', "PUT")}}
{{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
{!! Form::close() !!}
  --}}
@endsection