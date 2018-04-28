<nav id="sidebar">
            	<!-- Sidebar HEADER -->
                <div class="sidebar-header">
                    <h3>GameStop</h3>
                </div>
                <!-- Sidebar BODY -->
                <ul class="list-unstyled components">
                    <p>Avatar &nbsp; <a class="nav-link" href="/profile/{{Auth::user()->id}}">{{Auth::user()->name}}</a></p>
                    <li>
                    	<a class="nav-link" href="/profile/{{Auth::user()->id}}">My Profile</a>
                	</li>
                    <hr>
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
                    @if (Auth::user()-> auth_level !=='casual')
                    <li>           	
      					<a class="nav-link" href="{{route('admin')}}"> Admin Panel </a>
                    </li>
                    @endif         
                </ul>
                
                <ul class="list-unstyled CTAs" style="margin-top: 60%;">
                	<hr>
                    <li><a class="download" href="{{ route('logout') }}"
     						onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							{{ __('Logout') }} </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
						</form>
					</li>
                </ul>
            </nav>