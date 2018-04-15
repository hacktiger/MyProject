@extends('layouts.common.master')
@section('style')
  <title>Search</title>
  <style>
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

#Search {background-color: white;}
#Advanced {background-color: white;}
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
<button class="tablink" onclick="openPage('Search', this, 'black')"id="defaultOpen"><p>Search</p></button>
<button class="tablink" onclick="openPage('Advanced', this, 'white')" ><p style="color:black">Advanced Search</p></button>

<div id="Search" class="tabcontent">
	{!! Form::open() !!}
    {!! Form::text('search', null,
                           array('required',
                                'class'=>'form-control',
                                'placeholder'=>"Game's Title Contains...")) !!}
     {!! Form::submit('Search',
                                array('class'=>'btn btn-default')) !!}
 {!! Form::close() !!}

</div>
<div id="Advanced" class="tabcontent">
  <div class="container">
	<div class="row">
		<div class="col-md-6">
			Game Title contains
			<form action="['SearchController@normalSearch', $game->title], 'method'=>'POST']">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
				</div>
			</form>
			
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i>Submit</i></button>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="container">
				<h4>Tags</h4>
				<form>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Action</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Adventure
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">FPS
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Strategy</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Strategy</label>
				</form>
				<h4>Minimum Score</h4>
				<form>
					<label class="checkbox-inline">
						<input type="checkbox" value="">1</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">2</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">3</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">4</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">5</label>
			</div>
		</div>
	</div>
</div>
</div>



@endsection
