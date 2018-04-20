@extends('layouts.common.master')

@section('content')

<div class="container">
    @if(isset($details))
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Tile</th>
                <th>Developer</th>
                <th>Average Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $gameTitle)
            <tr>
                <td><a href="/games/{{$gameTitle->slug}}">{{$gameTitle->title}}</a></td>
                <td>{{$gameTitle->upload_by}}</td>
                <td>{{$gameTitle->avg_rating}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>@endsection