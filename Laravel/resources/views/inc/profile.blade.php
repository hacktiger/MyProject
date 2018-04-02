@extends('layouts.common.master')

@section('style')



@section('style')

@endsection

@section('content')
	<p>Profile page</p>
	<h3>{{Auth::user()->name}}</h3>

	<h3>{{Auth::user()->email}}</h3>
	


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
        echo "<a href='/games/$title'>$title</a>";
    }
} else {
    echo "0 results";
}

$conn->close();


?>

@endsection