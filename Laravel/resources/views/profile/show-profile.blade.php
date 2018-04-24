@extends('layouts.common.master')

@section('style')
<style type="text/css">
* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

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


#Profile {background-color: white;}
#OwnedGames {background-color: white;}
</style>
@endsection

@section('scripts')
  <script src="./js/bootstrap.min.js"></script>
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
    <button class="tablink col-md-6" onclick="openPage('Profile', this, 'black')" id="defaultOpen"><p style='color:white'>Profile</p></button>
    <button class="tablink col-md-6" onclick="openPage('OwnedGames', this, 'black')" ><p style="color:white">Owned Games</p></button>
</div>
<!-- PROFILE -->
<div id='Profile' class="tabcontent">
    <div class="row">
        <div class="col-md-4">
            <img  style="height: 70%; width: 70%; object-fit: contain;" alt="{{$user->avatar}}" src="/storage/avatars/{{$user->avatar}}">
            <br>
            {{--  edit profile  --}}
            @if (Auth::user()->id == $user->id)
            <a class="btn btn-primary" style="background-color: #4CAF50; color:white;" href="/profile/{{Auth::user()->id}}/edit">&ensp;Edit&ensp;</a>
            @endif
        	<h4>Username: {{Auth::user()->name}}</h4>
        	<h4>Email: {{Auth::user()->email}}</h4>
        
    		<h4>ID: {{Auth::user()->id}}</h4>
    		<!--Auth_level-->
    		<h4>Rank: {{Auth::user()->auth_level}}</h4>
    	</div>
   
    <div class ='col-md-8'><h1>Bio</h1>
        <p style="overflow-wrap:break-word;">
                {!!Auth::user()->description!!}
            </p>
        </div>
        </div>
</div>

<!-- OWNED GAMES -->
<div id="OwnedGames" class="tabcontent">
    <!-- show titles from owned_games-->
    <div class="container">
    <h3>All Games</h3>
    <table class="table border">
        <tbody>
            <tr>
                <td>Thumbnail</td>
                <td>Title</td>
                <td>Rating</td>
                <td>Developer</td>  
            </tr>
            <h2></h2>
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
