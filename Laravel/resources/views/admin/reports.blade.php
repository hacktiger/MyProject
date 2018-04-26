@extends('admin.admin')

@section('styles')
<style type="text/css">
td, th {
    border: 1px solid #dddddd;
    padding: 5px;
    text-align: center
}

tr:nth-child(even) {
    background-color: #dddddd;
}

</style>
@endsection

@section('content')
<table class = 'table'>
<thead>
    <tr>
        <th scope='col'>ID</th>
        <th scope='col'>Game Title</th>
        <th scope='col'>Reporter</th>
        <th scope='col'>Fraud</th>
        <th scope='col'>Impropriate</th>
        <th scope='col'>Plagarism</th>
        <th scope='col'>Other Reasons</th>
        <th scope='col'><font color='red'>Delete Report</font></th>
    </tr>
</thead>
<tbody>
    
    @foreach($reports as $report)
        <tr>
            <td>{{$report->id}}</td>
            <td><a href="/games/{{$report->slug}}">{{$report->title}}</td>
            <td><a href="/profile/{{$report->userID}}">{{$report->userName}}</a></td>
            <td>{{$report->Fraud}}</td>
            <td>{{$report->Impropriate}}</td>
            <td>{{$report->Plagarism}}</td>
            <td>{{$report->text}}</td>
            <td>{!! Form::open(['action'=> ['AdminController@removeReport', $report->id], 'method'=>'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=>' btn  btn-danger'])}}
                {!! Form::close() !!}</td>
        </tr>
    @endforeach
</tbody>

</table>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#game_report').addClass('current-active');
        $('#main,#profile_manage,#upload_game,#game_manage,#tag_manage').removeClass('current-active');
    </script>
@endsection