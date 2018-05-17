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


</style>
@endsection

@section('content')
<div class="row">
    <div class="col-md-8 col-sm-12">   
        <h1>Search Bar</h1>
        {!! Form::open(['action'=>'SearchController@salesLogSearch', 'method'=>'POST','class'=>'form-inline'])!!}
            {{ Form::text('title', '', ['class'=>'form-control','placeholder'=>'Game Title...', 'spellcheck'=>'false'])}}
            {{ Form::text('email', '', ['class'=>'form-control','placeholder'=>'User Email...', 'spellcheck'=>'false'])}}
            {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-md-8 col-sm-12">
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">User E-mail</th>
                    <th scope="col">Game Title</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>

            <tbody>
                @foreach($sales_log as $sales)
                <tr class="content">
                    <th scope="row">{{$sales->id}}</th>
                    <td>{{$sales->email}}</td>
                    <td>{{$sales->game_title}}</td>
                    <td><button class="btn btn-primary"><a href="/sales-log/{{$sales->id}}">Show Details</a></button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$sales_log->links()}}
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#sales_log').addClass('current-active');
    </script>
@endsection