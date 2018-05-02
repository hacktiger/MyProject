@extends('layouts.common.master')

@section('content')

<div class="container">
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
            @foreach($gameTitle as $gameTitles)
            <tr>
                <td><img style="width:180px;height: 60px" src = "/storage/cover_images/{{$gameTitles->image}}"></td>
                <td><a href="/games/{{$gameTitles->slug}}">{{$gameTitles->title}}</a></td>
                <td>{{$gameTitles->upload_by}}</td>
                <td>{{$gameTitles->avg_rating}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>@endsection