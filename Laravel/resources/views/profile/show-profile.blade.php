@extends('layouts.common.master')

@section('style')
<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

td, th {
    padding: 2px;
    text-align: center
}
thead {
    background-color: #7386D5;
    color:white;
}
.content:hover{
    background-color: #ebeef9;
}


</style>
@endsection

@section('scripts')
<script>

</script>

@endsection

@section('content')
<div class="container">
    <h2>My Profile</h2>
    <p>Navigate through your profile with the tabs below.</p>

    <!-- TABS -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="/profile/{{Auth::user()->id}}">My Profile</a></li>
        <li><a data-toggle="tab" href="#menu1">
            @if ($user->auth_level !== 'developer')
            Owned Games
            @endif
            @if ($user->auth_level =='developer')
            Games by {{$user->name}}
            @endif
        </a></li>
        <li><a data-toggle="tab" href="#menu2">Favorite Games</a></li>
    </ul>

    <!-- CONTENT IN TABS -->
    <div class="tab-content">
        <!-- MY PROFILE TAB -->
        <div id="home" class="tab-pane fade in active">
            <h3>My Profile</h3>
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
                        @if ($user->auth_level == 'ban')
                        <font color='red'><s>{{$user->auth_level}}</s></font></h4>
                        @endif
                        @if ($user->auth_level !='ban')
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


        <!-- OWNED GAMES -->
        <div id="menu1" class="tab-pane fade">
            <h3>
                @if ($user->auth_level !== 'developer')
                Owned Games
                @endif
                @if ($user->auth_level =='developer')
                Games by {{$user->name}}
                @endif
            </h3>

            <table class="table table-sm">
                <thead>
                    <tr>
                        <td class="hidden-sm hidden-xs"><h4>Thumbnail</h4></td>
                        <td><h4>Title</h4></td>
                        <td><h4>Rating</h4></td>
                        <td><h4>Developer</h4></td>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($owned_games as $games)
                    <tr  class="content" data-href="/games/{{$games->slug}}">
                        <td class="hidden-sm hidden-xs"><img style="width:180px;height: 60px" src="/storage/cover_images/{{$games->image}}"></td>
                        <td><a href="/games/{{$games->slug}}"> {{$games->title}}</a></td>
                        <td>{{$games->avg_rating}} &ensp;<span class="fa fa-star" style="color:orange;"></span></td>
                        <td>{{$games->upload_by}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$owned_games->links()}}
        </div>


        <!-- FAVORITES GAMES -->
        <div id="menu2" class="tab-pane fade">
            <h3>Favorite Games</h3>
            <table class="table ">
                <thead>
                    <tr>
                        <td class="hidden-sm hidden-xs"><h4>Thumbnail</h4></td>
                        <td><h4>Title</h4></td>
                        <td><h4>Rating</h4></td>
                        <td><h4>Developer</h4></td>  
                    </tr>
                </thead>
                <tbody>
                    @foreach($favorited as $game)
                    <tr  class="content" data-href="/games/{{$game->slug}}">
                        <td class="hidden-sm hidden-xs"><img style="width:180px;height: 60px" src="/storage/cover_images/{{$game->image}}"></td>
                        <td><a href="/games/{{$game->slug}}"> {{$game->game_title}}</a></td>
                        <td>{{$game->avg_rating}} &ensp;<span class="fa fa-star" style="color:orange;"></span></td>
                        <td>{{$game->upload_by}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$favorited->links()}}
        </div>
    <!-- END TAB CONTENT -->
    </div>
<!-- END CONTAINER -->
</div>   
@endsection

@section('scripts')
<script type="text/javascript">
    $('#profile_manage').addClass('current-active');
</script>
@endsection