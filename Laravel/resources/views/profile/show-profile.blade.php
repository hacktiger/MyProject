@extends('layouts.common.master')

@section('style')
<style type="text/css">
ul {
    list-style-type: none;
}

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
<div class="row">
<button class="tablink col-md-6" onclick="openPage('Profile', this, 'black')"id="defaultOpen"><p>Profile</p></button>
<button class="tablink col-md-6" onclick="openPage('OwnedGames', this, 'white')" ><p style="color:black">Owned Games</p></button>
</div>

<div id='Profile' class="tabcontent">
<br>
<div class="row">
    <div class="col-md-4">
        <h2>Avatar here</h2>
        <a class="btn btn-block" style="background-color: #4CAF50; color:white;" href="/profile/{{Auth::user()->id}}/edit">&ensp;Edit&ensp;</a>
    </div>
    <div class="col-md-4">
    	<h4>Username: {{Auth::user()->name}}</h4>
    	<h4>Email: {{Auth::user()->email}}</h4>
    </div>	
	<div class="col-md-4">
		<h4>ID: {{Auth::user()->id}}</h4>
		<!--Auth_level-->
		<h4>Rank: {{Auth::user()-> rank}}</h4>
	</div>
</div>
</br>
</div>

<div id="OwnedGames" class="tabcontent">
        <!-- show titles from owned_games-->
</div>
</div>

@endsection
