@extends('layouts.common.master')

@section('style')
<style type="text/css">
ul {
    list-style-type: none;
}


</style>

@endsection

@section('content')

<div class="row">
    <div class="col-md-8 col-sm-8">
    	<p>Profile page</p>
    	<h3>{{Auth::user()->name}}</h3>

    	<h3>{{Auth::user()->email}}</h3>
    	

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
            	$title = $row["title"];
                echo "<h3>title: </h3>"; 
                echo "<li><a href='/games/$title'>$title</a></li> <br>";
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