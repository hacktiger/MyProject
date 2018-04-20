<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  body {
    font-family: "Lato", sans-serif;
  }

  /* Fixed sidenav, full height */
  .sidenav {
    height: 100%;
    width: 200px;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 20px;
  }

  /* Style the sidenav links and the dropdown button */
  .sidenav a, .dropdown-btn {
    padding: 6px 8px 6px 16px;
    text-decoration: none;
    font-size: 20px;
    color: #818181;
    display: block;
    border: none;
    background: none;
    width: 100%;
    text-align: left;
    cursor: pointer;
    outline: none;
  }

  /* On mouse-over */
  .sidenav a:hover, .dropdown-btn:hover {
    color: #f1f1f1;
  }

  /* Main content */
  .main {
    margin-left: 200px; /* Same as the width of the sidenav */
    font-size: 20px; /* Increased text to enable scrolling */
    padding: 0px 10px;
  }

  /* Add an active class to the active dropdown button */
  .active {
    background-color: green;
    color: white;
  }

  /* Dropdown container (hidden by default). Optional: add a lighter background color and some left padding to change the design of the dropdown content */
  .dropdown-container {
    display: none;
    background-color: #262626;
    padding-left: 8px;
  }

  /* Optional: Style the caret down icon */
  .fa-caret-down {
    float: right;
    padding-right: 8px;
  }

  /* Some media queries for responsiveness */
  @media screen and (max-height: 450px) {
    .sidenav {padding-top: 15px;}
    .sidenav a {font-size: 18px;}
  }
</style>
</head>

<body>
  <!-- sidebar -->
  <div class="sidenav">
    <a class="nav-link" href="/games">Home</a>

    <a class="nav-link" href="/profile/{{Auth::user()->id}}">{{Auth::user()->name}}</a>
    
    <button class="dropdown-btn">Game Database 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-container">
      <a class="nav-link" href="/all-games">All Games</a>
      
      <button class= "dropdown-btn">Genres
        <i class="fa fa-caret-down"></i>
      </button>
      
      <div class="dropdown-container">
        <a class="nav-link" href="/allGames#Action">Action</a>
        <a class="nav-link" href="/allGames#Adventure">Adventure</a>
        <a class="nav-link" href="/allGames#FPS">FPS</a>
        <a class="nav-link" href="/allGames#Strategy">Strategy</a>
        <a class="nav-link" href="/allGames#Puzzle">Puzzle</a>
      </div>
      
      <a class="nav-link" href="{{route('top_games')}}">Top Games</a>
    </div>
    
    
    <a class="nav-link" href="{{route('dev_list')}}">Developers</a>
    
    
    <button class="dropdown-btn">Search 
      <i class="fa fa-caret-down"></i>
    </button>

    <div class="dropdown-container">
      <form action="/search" method="POST" role="search">
        {{ csrf_field() }}
        <input type="text" class="form-control" name="q"
        placeholder="Search by Title"> <span class="input-group-btn">
          <button type="submit" class="btn btn-primary btn-block">
            <span class="glyphicon glyphicon-search"> Search </span>
          </button>
        </span>
      </form>
    </div>


    @if (Auth::user()-> auth_level !=='casual')
      <a class="nav-link" href="{{route('admin')}}"> Admin Panel </a>
    @endif 
    
    <!--Logout link-->
    <div style="position: absolute; bottom: 5px">
     <a class="nav-link" href="{{ route('logout') }}"
     onclick="event.preventDefault();
     document.getElementById('logout-form').submit();">
     {{ __('Logout') }}
   </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
   </form>
 </div>
</div>



<script>
  /* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
  var dropdown = document.getElementsByClassName("dropdown-btn");
  var i;

  for (i = 0; i < dropdown.length; i++) {
    dropdown[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var dropdownContent = this.nextElementSibling;
      if (dropdownContent.style.display === "block") {
        dropdownContent.style.display = "none";
      } else {
        dropdownContent.style.display = "block";
      }
    });
  }
</script>

</body>
</html> 
