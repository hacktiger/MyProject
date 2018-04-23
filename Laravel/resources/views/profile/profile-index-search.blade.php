@extends('admin.admin')
@section('content')
<div class="container">
    @if(isset($details))
    <div class="container">
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
        <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Rank</th>
            </tr>
        </thead>
        <tbody>
            @foreach($details as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td><a href="/profile/{{$user->id}}">{{$user->name}}</a></td>
                <td>{{$user->email}}</td>
                <td>{{$user->auth_level}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

@endsection