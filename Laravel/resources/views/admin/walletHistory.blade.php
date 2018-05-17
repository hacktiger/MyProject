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
<div class="col">
    <div class="col-md-8 col-sm-12">
        <div class="container">
            <h1>Search Bar</h1>
            {!! Form::open(['action'=>'SearchController@walletHistorySearch', 'method'=>'POST','class'=>'form-inline'])!!}
                {{ Form::text('name', '', ['class'=>'form-control','placeholder'=>'Username...', 'spellcheck'=>'false'])}}
            {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
            {!!Form::close()!!}
            <br><br>
        </div>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Date</th>
                </tr>
            </thead>

            <tbody>
                @foreach($log as $logs)
                <tr class="content">
                    <th scope="row">{{$logs->id}}</th>
                    <td>{{$logs->name}}</td>
                    <td>{{$logs->amount}}</td>
                    <td>{{$logs->created_at}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$log->links()}}
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $('#wallet_history').addClass('current-active');
</script>
@endsection

