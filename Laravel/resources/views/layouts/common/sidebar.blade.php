<nav id="sidebar">
  <!-- Sidebar HEADER -->
  <div class="sidebar-header">
    <h3><a href="/backHome">GameStop</a></h3>
</div>
<!-- Sidebar BODY -->
<ul class="list-unstyled components" >

    <a id = "myProfile" class="nav-link" href="/profile/{{Auth::user()->id}}"><p class="avatar-main"><img  style="height: 50px; width: 70px; object-fit: cover;" alt="{{Auth::user()->avatar}}" src="/storage/avatars/{{Auth::user()->avatar}}">
       &nbsp; <b><span>{{Auth::user()->name}}</span></b>

   </p></a>
   <li id="myWallet">
      <a class="nav-link" href="/profile/{{Auth::user()->id}}/wallet">My wallet : {{Auth::user()->wallet}}$ &nbsp; <span class="glyphicon glyphicon-plus-sign"></span></a>
  </li>
  <hr>
  <li id="home" style="text-align: center;">
    <a href="/backHome" class="nav-link">Home</a>
</li> <br>
<li >
    <form style="width: 90%; padding-left: 5%"  action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="q"
        placeholder="Search Game by Title"> 
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-block">
                <span class="glyphicon glyphicon-search"> Search </span>
            </button>
        </span>
    </form>
</li>
<br>
<li id="advancedSearch" style="text-align: center;">
    <a class= 'nav-link' href ='/search/advance'>Advanced Search</a>
</li>
<li style="text-align: center;">
    <a id = "all_games" class="nav-link" href="{{route('all_games')}}">All Games</a> 
</li>
<li style="text-align: center;">
    <a id="top_games" class="nav-link" href="{{route('top_games')}}">Top Games</a>                
</li style="text-align: center;">

<li style="text-align: center;">
  <a id="most_downloads" class="nav-link" href="{{route('most_download')}}">Most Downloads</a>
</li>
@if (Auth::user()-> auth_level =='admin')
<li style="text-align: center;">   
    <hr>        
    <a class="nav-link" href="{{route('admin.index')}}"> Admin Panel </a>
    <hr>
</li>
@endif   
@if(Auth::user()->auth_level == 'admin' ||Auth::user()->auth_level == 'developer')      
<li style = 'text-align:center'>
    <a id="upload_game" class="btn btn-primary" href="{{route('games.create')}}">Upload Game</a> 
</li>
@endif
</ul>

<ul class="list-unstyled CTAs" style="position:relative;">
  <hr>
  <li><a class="download" href="{{ route('logout') }}"
    onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
    {{ __('Logout') }} &nbsp; <span class="glyphicon glyphicon-log-out"></span></a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
</ul>
</nav>