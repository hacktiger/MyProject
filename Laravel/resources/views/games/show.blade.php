@extends('layouts.common.master')

@section('style')

@endsection

@section('content')

<h3>{{$game->title}}</h3>
<div class="container" style="overflow-wrap:break-word;">
{{$game->description}}
</div>
@endsection

