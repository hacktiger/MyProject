@extends ('layouts.common.master')
@section('style')

{!! Html::style('css/select2.min.css') !!}


@endsection
@section ('content')

<h1> Advanced Search</h1>

{!! Form::open(['action'=>"SearchController@advancedSearch", 'method' =>'POST', 'enctype'=>'multipart/form-data'])!!}

{{--  Search by title  --}}
<div class = 'form-group'>
    {{Form::label('title', 'Title')}}
    {{Form::text('title','',['class'=>'form-control', 'placeholder'=>'Title Contains...', 'spellcheck'=>'false'])}}
</div>


{{--  Search by developer  --}}
<div class = 'form-group'>
  {{Form::label('upload_by', 'Developer')}}
  {{Form::text('upload_by','',['class'=>'form-control', 'placeholder'=>'From Developer...', 'spellcheck'=>'false'])}}
</div>

{{--  Search by rating  --}}
<div class = 'form-group'>
    {{Form::label('avg_rating', 'Rating')}}
    {{Form::text('avg_rating','',['class'=>'form-control', 'placeholder'=>'Minimum Rating (from 0 to 5)...', 'spellcheck'=>'false'])}}
  </div>

            
<div class = 'form-group'>
 	{{Form::label ('tag', 'Genre (Choose one tag)')}}
 	<select class="form-control select2-multi" name="tags[]" multiple="multiple">
        @foreach($tags as $tag)
        <option value='{{$tag->id}}'>{{$tag->name}}</option>
        @endforeach
    </select>
</div>
{{Form::submit('Submit', ['class' =>'btn btn-primary'])}}
{!! Form::close() !!}
@endsection

@section('scripts')
{!! Html::script('js/select2.min.js') !!}

<script type="text/javascript">
    $('.select2-multi').select2();
</script>
@endsection