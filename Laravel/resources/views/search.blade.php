@extends('layouts.common.master')

@section('content')

<div class="container">
    @if(isset($details))
       <h2> Query {{$query}} Results</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tile</th>
                <th>Developer</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $gameTitle)
            <tr>
                <td><a href="/games/{{$gameTitle->slug}}">{{$gameTitle->title}}</a></td>
                <td>{{$gameTitle->upload_by}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>@endsection