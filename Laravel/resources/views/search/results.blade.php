@extends('layouts.common.master')

@section('content')

<div class="container">
    @if(isset($details))
    <h1>Search Results</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Title</th>
                <th>Developer</th>
                <th>Average Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $gameTitle)
            <tr>
                <td><img style="width:180px;height: 60px" src = "/storage/cover_images/{{$gameTitle->image}}"></td>
                <td><a href="/games/{{$gameTitle->slug}}">{{$gameTitle->title}}</a></td>
                <td>{{$gameTitle->upload_by}}</td>
                <td>{{$gameTitle->avg_rating}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>@endsection