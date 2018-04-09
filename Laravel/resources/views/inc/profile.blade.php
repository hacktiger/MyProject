@extends('layouts.common.master')

@section('style')
<style type="text/css">
ul {
    list-style-type: none;
}


</style>

@endsection

@section('content')

<h1>Profile page</h1>
<br>
<div class="row" id="Profile">
    <div class="col-md-6">
    	<h4>Username: {{Auth::user()->name}}</h4>
    	<h4>Email: {{Auth::user()->email}}</h4>
    </div>	
	<div class="col-md-6">
		<h4>ID: {{Auth::user()->id}}</h4>
		<!--Auth_level-->
		<h4>Rank: {{Auth::user()-> auth_level}}</h4>
	</div>
</div>
</br>

<div id="OwnedGames"><h1>Owned Games List</h1>
        <ul class="">
        <?php 
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "gamestop";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT title FROM games WHERE upload_by = '1' ";
        $result = $conn->query($sql);


        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
				echo "<div class='row'>";
					//game cover
					echo "<div class='col-md-3'>";
						echo "game cover";
						echo "</div>";
					
					//game title
					echo "<div class='col-md-3'>";
						$title = $row["title"];
						echo "<li><a href='/games/$title'>$title</a></li> <br>";
					echo "</div>";
					
					//price
					echo "<div class='col-md-3'>";
						echo "game price";
					echo "</div>";
				echo "</div>";
            }
        } else {
            echo "0 results";
        }

        $conn->close();


        ?>
        </ul>
</div>
    <div>
    </div>
</div>


@endsection
