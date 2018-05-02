@extends('layouts.common.master')

@section('style')
<style type="text/css">
* {box-sizing: border-box}

/* Style tab links */
.tablink {
    background-color: #555;
    color: white;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    font-size: 17px;
    width: 25%;
}

.tablink:hover {
    background-color: #777;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: black;
    display: none;
    padding: 100px 20px;
    height: 100%;
}

.hover-row:hover{
    background-color: #f2f2f2;
    cursor: pointer;
}
tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
@endsection

@section('scripts')
<script>
function openPage(pageName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(pageName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

@endsection

@section('content')
<!-- TABS -->
<div class="row">
    <button class="col-md-4 tablink " onclick="openPage('Profile', this, 'black')" id="defaultOpen"><p style='color:white'>Profile</p></button>
    <button class="col-md-4 tablink " onclick="openPage('MyFavorites', this, 'black')" ><p style="color:white">Favorited Games</p></button>
    <button class="col-md-4 tablink " onclick="openPage('OwnedGames', this, 'black')" ><p style="color:white">
        @if ($user->auth_level !== 'developer')
        Owned Games
        @endif
        @if ($user->auth_level =='developer')
        Games by {{$user->name}}
        @endif
    </p></button>
</div>


<!-- TAB CONTENTS -->
<!-- PROFILE -->
<div id='Profile' class="tabcontent">
    <div class="row">
        <div class="col-md-4 col-sm-12">
            <img  style="height: 100%; width: 80%; object-fit: cover;" alt="{{$user->avatar}}" src="/storage/avatars/{{$user->avatar}}">

            <br>
            {{--  edit profile  --}}
            @if (Auth::user()->id == $user->id)
            <a class="btn btn-primary" style="background-color: #4CAF50; color:white;" href="/profile/{{Auth::user()->id}}/edit">&ensp;Edit&ensp;</a>
            @endif
        	<h4>Username: {{$user->name}}</h4>
        	<h4>Email: {{$user->email}}</h4>
        
    		<h4>ID: {{$user->id}}</h4>
    		<!--Auth_level-->
    		<h4>Rank: 
                @if ($user->auth_level == 'banned')
                <font color='red'><s>{{$user->auth_level}}</s></font></h4>
                @endif
                @if ($user->auth_level !='banned')
                {{$user->auth_level}}
                @endif
    	</div>
   
    <div class ='col-md-8 col-sm-12'><h1>Bio</h1>
        <p style="overflow-wrap:break-word;">
                {!!$user->description!!}
            </p>
        </div>
        </div>
</div>
<!-- favorite games -->
<div id="MyFavorites" class="tabcontent">
    <div class="container">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <td>Thumbnail</td>
                <td>Title</td>
                <td>Rating</td>
                <td>Developer</td>  
            </tr>
        </thead>
        <tbody>
            @foreach($favorited as $game)
            <tr  class="clickable-row hover-row" data-href="/games/{{$game->slug}}">
                <td><img style="width:180px;height: 60px" src="/storage/cover_images/{{$game->image}}"></td>
                <td><a href="/games/{{$game->slug}}"> {{$game->game_title}}</a></td>
                <td>{{$game->avg_rating}} &ensp;<span class="fa fa-star" style="color:orange;"></span></td>
                <td>{{$game->upload_by}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$favorited->links()}}
</div>
<!-- OWNED GAMES -->
<div id="OwnedGames" class="tabcontent">
    aaaaaaaaaaaaaaaaaaaa
    <!-- show titles from owned_games-->
    <div class="container">
    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <td>Thumbnail</td>
                <td>Title</td>
                <td>Rating</td>
                <td>Developer</td>  
            </tr>
        </thead>
        <tbody>
            @foreach($owned_games as $games)
            <tr  class="clickable-row hover-row" data-href="/games/{{$games->slug}}">
                <td><img style="width:180px;height: 60px" src="/storage/cover_images/{{$games->image}}"></td>
                <td><a href="/games/{{$games->slug}}"> {{$games->game_title}}</a></td>
                <td>{{$games->avg_rating}} &ensp;<span class="fa fa-star" style="color:orange;"></span></td>
                <td>{{$games->upload_by}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$owned_games->links()}}
</div>
    
@endsection
