<header class=" cus-header container-fluid">
		<div class="nav-item dropdown float-right">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }} <span class="caret"></span>
			</a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="downdown-item" href="{{ route('profile')}}"> Profile </a>
                </li>
                <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
					onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

	            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                @csrf
	            </form>
                </li>

             </div>
        </div>
</header>