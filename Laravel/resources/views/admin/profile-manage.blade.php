@extends('admin.admin')

@section('styles')
<style type="text/css">
table {
    border-collapse: collapse;
    width: 100%;
}

td, th {
    padding: 2px;
    text-align: center
}
thead {
    background-color: #7386D5;
    color:white;
}
.content:hover{
    background-color: #ebeef9;
}

/* Style tab links */
.tablink {
    background-color: #c4cced;
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
    background-color: #7689d6 ;
}

/* Style the tab content (and add height:100% for full page content) */
.tabcontent {
    color: black;
    display: none;
    padding: 100px 20px;
    height: 100%;
}


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
</script>
@endsection

@section('content')
<div class="row">
    <button class="tablink col-md-4" onclick="openPage('Profile', this, '#4e67ca')" id="defaultOpen"><p style='color:white'>Profile</p></button>
    <button class="tablink col-md-4" onclick="openPage('Admins', this, '#4e67ca')" ><p style="color:white">Admins</p></button>
    <button class="tablink col-md-4" onclick="openPage('Devs', this, '#4e67ca')" ><p style="color:white">Developers</p></button>
</div>
<div class="row">
<div class="container col-sm-12 col-md-8">
    <h1>Profile Search</h1>
    {!! Form::open(['action'=>"SearchController@profileSearch", 'method' =>'POST', 'enctype'=>'multipart/form-data'])!!}
    
    <div class = 'form-group'>
        {{Form::label('username', 'username')}}
        {{Form::text('userName', '',['class'=>'form-control', 'placeholder'=>'...'])}}
    </div>

    <div class = 'form-group'>
        {{Form::label('id', 'ID')}}
        {{Form::text('id','', ['class'=>'form-control', 'placeholder'=>'...'])}}
    </div>

    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!!Form::close()!!}
</div>
</div>
<div id='Profile' class="tabcontent">
    <div class="row">
        <div class="col-md-8 col-sm-12">
            <table class="table table-sm  table-responsive-sm">
                <thead >
                    <tr>
                        <th scope="col">User Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ban</th>
                        <th scope="col">Make Dev</th>
                        <th scope="col">Make Admin</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($user as $users)
                    <tr class="content">
                        <th scope="row"><a href="/profile/{{$users->id}}">{{$users->name}}</a></th>
                        <th>{{$users->email}}</th>
                        <th>{!! Form::open(['action'=> ['ProfileController@destroy', $users->id], 'method'=>'POST']) !!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Ban', ['class'=>' btn  btn-danger'])}}
                        {!! Form::close() !!}
                        </th>
                        <th>{!! Form::open(['action'=> ['ProfileController@makeDev', $users->id], 'method'=>'POST']) !!}
                            {{Form::submit('Make Dev', ['class'=>' btn  btn-warning'])}}
                        {!! Form::close() !!}</th>
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
                        <th>Ban</th>
                        <th>Turn to User</th>
                    </tr>
                </thead>
                @if(isset($admin))
                <tbody>
                    @foreach($admin as $admins)
                    <tr>
                        <th><a href="/profile/{{$admins->id}}">{{$admins->name}}</a></th>
                        <th>{{$admins->email}}</th>
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
                @endif
            </table>
        </div>
    </div>
</div>

<div id="Devs" class="tabcontent">
    <div class="col">
        <div class="col-md-8 col-sm-8">
            <table class="table table-sm table-hove">
                <thead class="thead-dark">
                    <tr>
                        <th>Dev Name</th>
                        <th>E-mail</th>
                        <th>Ban</th>
                        <th>Turn to User</th>
                    </tr>
                </thead>
                @if(isset($dev))
                <tbody>
                    @foreach($dev as $devs)
                    <tr>
                        <th><a href="/profile/{{$devs->id}}">{{$devs->name}}</a></th>
                        <th>{{$devs->email}}</th>
                        <th>{!! Form::open(['action'=> ['ProfileController@destroy', $devs->id], 'method'=>'POST']) !!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Ban', ['class'=>' btn  btn-danger'])}}
                            {!! Form::close() !!}
                        </th>
                        <th>{!! Form::open(['action'=> ['ProfileController@dropAdmin', $devs->id], 'method'=>'POST']) !!}
                                {{Form::submit('Drop Dev', ['class'=>' btn  btn-primary'])}}
                            {!! Form::close() !!}</th>
                    </tr>
                    @endforeach
                </tbody>
                @endif
            </table>
        </div>
    </div>
</div>


@endsection

