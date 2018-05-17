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
    <div class="col-md-8">
        <div class="container">
            <h1>Search Bar</h1>
            {!! Form::open(['action'=>'SearchController@reportSearch', 'method'=>'POST','class'=>'form-inline'])!!}
                {{ Form::text('title', '', ['class'=>'form-control','placeholder'=>'Game Title...', 'spellcheck'=>'false'])}}
                {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
            <br><br>
        </div>
        <table class = 'table table-responsive-sm table-hover table-striped'>
            <thead>
                <tr>
                    <th scope='col'>ID</th>
                    <th scope='col'>Game Title</th>
                    <th scope='col'>Reporter</th>
                    <th scope='col'>Reason</th>
                    <th scope='col'>Delete Report</th>
                </tr>
            </thead>
            <tbody>

                @foreach($reports as $report)
                <tr class="content">
                    <th scope="row">{{$report->id}}</th>
                    <td><a href="/games/{{$report->slug}}">{{$report->title}}</a></td>
                    <td><a href="/profile/{{$report->userID}}">{{$report->userName}}</a></td>
                    <td>{{$report->text}}</td>
                    <td>{!! Form::open(['action'=> ['AdminController@removeReport', $report->id], 'method'=>'POST']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class'=>' btn  btn-danger'])}}
                    {!! Form::close() !!}</td>
                </tr>
                @endforeach
            </tbody>

        </table>


    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#game_report').addClass('current-active');
</script>
@endsection