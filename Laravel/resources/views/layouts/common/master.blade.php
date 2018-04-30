<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{config('app.name', 'GameStop')}} | The Best Game Platform</title>

        <!-- Bootstrap CSS CDN -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <!-- Scrollbar Custom CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

<style type="text/css">
	@import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";

	body {
	    font-family: 'Poppins', sans-serif;
	    background: #fafafa;
	}

	p {
	    font-family: 'Poppins', sans-serif;
	    font-size: 1.1em;
	    font-weight: 300;
	    line-height: 1.7em;
	    color: #999;
	}

	a, a:hover, a:focus {
	    color: inherit;
	    text-decoration: none;
	    transition: all 0.3s;
	}

	.navbar {
	    padding: 15px 10px;
	    background: #fff;
	    border: none;
	    border-radius: 0;
	    margin-bottom: 40px;
	    box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
	}

	.navbar-btn {
	    box-shadow: none;
	    outline: none !important;
	    border: none;
	}

	.line {
	    width: 100%;
	    height: 1px;
	    border-bottom: 1px dashed #ddd;
	    margin: 40px 0;
	}

	/* ---------------------------------------------------
	    SIDEBAR STYLE
	----------------------------------------------------- */
	#sidebar {
	    width: 250px;
	    position: fixed;
	    top: 0;
	    left: 0;
	    height: 100vh;
	    z-index: 999;
	    background: #737373;
	    color: #fff;
	    transition: all 0.3s;
	}
	#sidebar.active {
	    margin-left: -250px;
	}

	#sidebar .sidebar-header {
	    padding: 20px;
	    background: #4d4d4d;
	}

	#sidebar ul.components {
	    padding: 20px 0;
	}

	#sidebar ul p {
	    color: #fff;
	    padding: 10px;
	}

	#sidebar ul li a {
	    padding: 10px;
	    font-size: 1.1em;
	    display: block;
	}
	#sidebar ul li a:hover {
	    color: 	#737373;
	    background: #fff;
	}

	#sidebar ul li.active > a, a[aria-expanded="true"] {
	    color: #fff;
	    background: #737373;
	}


	a[data-toggle="collapse"] {
	    position: relative;
	}

	a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {

	    display: block;
	    position: absolute;
	    right: 20px;
	    font-family: 'Glyphicons Halflings';
	    font-size: 0.6em;
	}
	a[aria-expanded="true"]::before {
	    
	}

	ul ul a {
	    font-size: 0.9em !important;
	    padding-left: 30px !important;
	}

	ul.CTAs {
	    padding: 20px;
	}

	ul.CTAs a {
	    text-align: center;
	    font-size: 0.9em !important;
	    display: block;
	    border-radius: 5px;
	    margin-bottom: 5px;
	}
	a.download {
	    background: #fff;
	    color: 	#737373;
	}
	a.article, a.article:hover {
	    background: #737373 !important;
	    color: #fff !important;
	}


	/* ---------------------------------------------------
	    CONTENT STYLE
	----------------------------------------------------- */
	#content {
	    width: calc(100% - 250px);
	    padding: 40px;
	    min-height: 100vh;
	    transition: all 0.3s;
	    position: absolute;
	    top: 0;
	    right: 0;
	}
	#content.active {
	    width: 100%;
	}


	/* ---------------------------------------------------
	    MEDIAQUERIES
	----------------------------------------------------- */
	@media (max-width: 768px) {
	    #sidebar {
	        margin-left: -250px;
	    }
	    #sidebar.active {
	        margin-left: 0;
	    }
	    #content {
	        width: 100%;
	    }
	    #content.active {
	        width: calc(100% - 250px);
	    }
	    #sidebarCollapse span {
	        display: none;
	    }
	}	
	.current-active {
		background-color: #fff;
		color: 	#737373;
	}	
	.avatar-main:hover{
	    background-color: #fff;
	}

	}
</style>
@yield('style')
</head>
    <body>
        <div class="wrapper">
            <!-- Sidebar Holder -->
            @include('layouts.common.sidebar-test')

            <!-- Page Content Holder -->
            <div id="content">
            <!-- HORIZONTAL Navbar -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" id="sidebarCollapse" class="btn  navbar-btn" style="background-color: 	#737373; color: #fff">
                                <i class="glyphicon glyphicon-align-left"></i>
                                <span>Toggle Sidebar</span>
                            </button>                                                   
                        </div>


                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        	<ul class="nav navbar-nav navbar-right">
                                <li><div class="dropdown">
									  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{Auth::user()->name}}
									  <span class="caret"></span></button>
									  <ul class="dropdown-menu cus-list">
									    <li><a href="/profile/{{Auth::user()->id}}"><span class="glyphicon glyphicon-user"></span>&nbsp;MyProfile</a></li>
									    <li><a href="/profile/{{Auth::user()->id}}/wallet"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;Add Wallet</a></li>
									    <li><a href="#"><span class="glyphicon glyphicon-globe"></span>&nbsp;Notification</a></li>
									    <li style="padding-bottom: 3%;"><a class="download" href="{{ route('logout') }}"
				     						onclick="event.preventDefault();
											document.getElementById('logout-form').submit();"><span class="glyphicon glyphicon-log-out"></span>&nbsp;
											{{ __('Logout') }}  </a></li>
									  </ul>
									</div>
                                </li>
                            </ul>	
                        </div>
                    </div>
                </nav>
            <div style=" padding : 5px; box-shadow: 2px 2px #888888;">Notification by admins</div>
            @yield('content')

            <!-- END MAIN CONTENT -->
            </div>
        </div>

        <!-- jQuery CDN -->
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
        <!-- Bootstrap Js CDN -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- jQuery Custom Scroller CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $("#sidebar").mCustomScrollbar({
                    theme: "minimal"
                });

                $('#sidebarCollapse').on('click', function () {
                    $('#sidebar, #content').toggleClass('active');
                    $('.collapse.in').toggleClass('in');
                    $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                });   
            });
        </script>
        @yield('scripts')
    </body>
</html>
