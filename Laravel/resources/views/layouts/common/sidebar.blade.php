<nav id="sidebar">
              <!-- Sidebar HEADER -->
                <div class="sidebar-header">
                    <h3><a href="/backHome">GameStop</a></h3>
                </div>
                <!-- Sidebar BODY -->
                <ul class="list-unstyled components">

                    <p class="avatar-main"><img  style="height: 50px; width: 70px; object-fit: cover;" alt="{{Auth::user()->avatar}}" src="/storage/avatars/{{Auth::user()->avatar}}">
                     &nbsp; <a class="nav-link" href="/profile/{{Auth::user()->id}}"><b>{{Auth::user()->name}}</b></a>

                    </p>
                    <li>
                      <a class="nav-link" href="/profile/{{Auth::user()->id}}/wallet">My wallet : {{Auth::user()->wallet}}$ &nbsp; <span class="glyphicon glyphicon-plus-sign"></span></a>
                  </li>
                    <hr>
                    <li>
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
                    <li>
                        <a class= 'nav-link' href ='/search/advance'>Advance Search</a>
                    </li>
                    <li>
                        <a id = "all_games" class="nav-link" href="/all-games">All Games</a> 
                    </li>
                    <li>
                        <a id = "all_genres" class="nav-link" href="/tags/1">All Genres</a>
                    </li>
                    <li>
                        <a id="top_games" class="nav-link" href="{{route('top_games')}}">Top Games</a>                
                    </li>
                    <li>
                      <a id="most_downloads" class="nav-link" href="{{route('most_download')}}">Most Downloads</a>
                    </li>
                    @if (Auth::user()-> auth_level =='admin')
                    <li>   
                        <hr>        
                <a class="nav-link" href="{{route('admin.index')}}"> Admin Panel </a>
                        <hr>
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