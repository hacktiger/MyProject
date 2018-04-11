@extends('layouts.common.master')

@section('style')

@endsection
@section('scripts')

@endsection

@section('content')

  <br>
  <!-- prints out every game -->
  @foreach($tag as $tags)
  <div class="well">
    <h3><a href="/games/{{$tags->name}}">{{$tags->name}}</a></h3>
  </div>
  @endforeach
  
  
 <br>


 @endsection