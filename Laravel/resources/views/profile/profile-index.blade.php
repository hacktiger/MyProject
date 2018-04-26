@extends('admin.admin')

@section('styles')
<style type="text/css">

* {box-sizing: border-box}

/* Set height of body and the document to 100% */
body, html {
    height: 100%;
    margin: 0;
    font-family: Arial;
}

table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    padding: 5px;
    text-align: center
}

tr:nth-child(even) {
    background-color: #dddddd;
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
#Admins {background-color: white;}

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
$('#profile_manage').addClass('current-active');
$('#main,#upload_game,#game_manage,#game_report,#tag_manage').removeClass('current-active');
</script>
@endsection

@section('content')
<div class="row">
    <button class="tablink col-md-6" onclick="openPage('Profile', this, 'black')" id="defaultOpen"><p style='color:white'>Profile</p></button>
    <button class="tablink col-md-6" onclick="openPage('Admins', this, 'black')" ><p style="color:white">Admins</p></button>
</div>
<div class="row">
<div class="container col-sm-12 col-md-8 col-lg-8">
    <h1>Profile Search</h1>
    {!! Form::open(['action'=>"SearchController@profileSearch", 'method' =>'POST', 'enctype'=>'multipart/form-data'])!!}
    
    <div class = 'form-group'>
        {{Form::label('username', 'username')}}
        {{Form::text('userName', '',['class'=>'form-control', 'placeholder'=>'...'])}}
    </div>

    <div class = 'form-group'>
        {{Form::label('id', 'id')}}
        {{Form::text('ID','', ['class'=>'form-control', 'placeholder'=>'...'])}}
    </div>

    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
</div>
</div>
<div id='Profile' class="tabcontent">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <table class="table table-sm table-hove">
                <thead class="thead-dark">
                    <tr>
                        <th>User Name</th>
                        <th>E-mail</th>
                        <th>Edit</th>
                        <th>Ban</th>
                        <th>Make Admin</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user as $users)
                    <tr>
                        <th><a href="/profile/{{$users->id}}">{{$users->name}}</a></th>
                        <th>{{$users->email}}</th>
                        <th><a class="btn" style="background-color: #4CAF50; color:white;" href="/profile/{{$users->id}}/edit">&ensp;Edit&ensp;</a></th>
                        <th>{!! Form::open(['action'=> ['ProfileController@destroy', $users->id], 'method'=>'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Ban', ['class'=>' btn  btn-danger'])}}
                        {!! Form::close() !!}
                        </th>
                        <th>{!! Form::open(['action'=> ['ProfileController@makeAdmin', $users->id], 'method'=>'POST']) !!}
                            {{Form::submit('Make Admin', ['class'=>' btn  btn-primary'])}}
                        {!! Form::close() !!}</th>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            {{ $user->links() }}
        </div>
    </div>

</div>

<div id="Admins" class="tabcontent">
    <div class="col">
        <div class="col-md-8 col-sm-8">
            <table class="table table-sm table-hove">
                <thead class="thead-dark">
                    <tr>
                        <th>Admin Name</th>
                        <th>E-mail</th>
                        <th>Edit</th>
                        <th>Ban</th>
                        <th>Turn to User</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($admin as $admins)
                    <tr>
                        <th><a href="/tags/{{$admins->id}}">{{$admins->name}}</a></th>
                        <th>{{$users->email}}</th>
                        <th><a class="btn" style="background-color: #4CAF50; color:white;" href="/tags/{{$admins->id}}/edit">&ensp;Edit&ensp;</a></th>
                        <th>{!! Form::open(['action'=> ['ProfileController@destroy', $admins->id], 'method'=>'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Ban', ['class'=>' btn  btn-danger'])}}
                            {!! Form::close() !!}
                        </th>
                        <th>{!! Form::open(['action'=> ['ProfileController@dropAdmin', $admins->id], 'method'=>'POST']) !!}
                                {{Form::submit('Drop Admin', ['class'=>' btn  btn-primary'])}}
                            {!! Form::close() !!}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection


@section('scripts')
@endsection