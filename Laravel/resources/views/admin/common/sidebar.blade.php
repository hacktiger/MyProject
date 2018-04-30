<nav id="sidebar">
            	<!-- Sidebar HEADER -->
                <div class="sidebar-header">
                    <h3>GameStop Img here</h3>
                </div>
                <!-- Sidebar BODY -->
                <ul class="list-unstyled components">
                    <p>Welcome &nbsp; {{Auth::user()->name}}</p>
                    <hr>
                    <li>
                        <a id="main" class='nav-link current-active' href="{{route('admin.index')}}">Admin Dashboard</a> 
                    </li>
                    <li>
                        <a id="upload_game" class='nav-link' href="{{route('games.create')}}">Upload Game</a> 
                    </li>
                    <li>
                        <a id="game_manage" class="nav-link" href="{{route('games.manage')}}">Game Manage &nbsp; 
                            @if($new_game_count != 0)
                            <span class="badge badge-light"> &nbsp; {{$new_game_count}}&nbsp; </span>
                            @endif
                        </a>                 
                    </li>
                    <li>
                    	<a id="sales_log" class="nav-link" href="{{route('admin.sales_log')}}">Sales Log &nbsp; 
                            @if($new_sales_log_count != 0)
                            <span class="badge badge-light"> &nbsp; {{$new_sales_log_count}}&nbsp; </span>
                            @endif
                        </a>
                    </li>
                    <li>
                    	<a id="wallet_history" class="nav-link" href="{{route('admin.wallet_history')}}">Wallet History &nbsp; 
                            @if($new_wallet_count != 0)
                            <span class="badge badge-light"> &nbsp; {{$new_wallet_count}}&nbsp; </span>
                            @endif 
                        </a>
                    </li>
                    <li>
                    	<a id="game_report" class ='nav-link' href="{{route('show.report')}}">Game Reports  &nbsp; 
                            @if($new_game_report_count != 0)
                            <span class="badge badge-light"> &nbsp; {{$new_game_report_count}}&nbsp; </span>
                            @endif 
                        </a>
                    </li>
                    <li>
                        <a id="tag_manage" class="nav-link" href="{{route('tags.manage')}}">Tags Manage &nbsp; 
                            @if($new_tag_count != 0)
                            <span class="badge badge-light"> &nbsp; {{$new_tag_count}}&nbsp; </span>
                            @endif 
                        </a>
                    </li>
                    <li>
                        <a id="profile_manage" class="nav-link" href="{{route('profiles.manage')}}">Profile Manage &nbsp; 
                            @if($new_profile_count != 0)
                            <span class="badge badge-light"> &nbsp; {{$new_profile_count}}&nbsp; </span>
                            @endif  
                        </a>  
                    </li>
                    <li>
                        <a id="profile_manage" class="nav-link" href="{{route('admin.notify')}}">Notifications
                        </a>  
                    </li>             
                </ul>
                
                <ul class="list-unstyled CTAs" style="margin-top: 8%;">
                	<hr>
                	<li><a class="article" href="{{ route('main') }}">
						User Interface
					</a></li>
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