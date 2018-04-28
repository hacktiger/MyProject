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

<!-- prints out every tags -->
<div class="col">
    <div class="col-md-8 col-sm-12">
        <table class="table table-sm">
            <thead >
                <tr>
                    <th>Game Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach($game as $games)
                <tr class="content">
                    <th><a href="/games/{{$games->slug}}">{{$games->title}}</a></th>
                    <th><a class="btn" style="background-color: #4CAF50; color:white;" href="/games/{{$games->slug}}/edit">&ensp;Edit&ensp;</a></th>
                    <th>{!! Form::open(['action'=> ['GamesController@destroy', $games->title], 'method'=>'POST']) !!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class'=>' btn  btn-danger'])}}
                    {!! Form::close() !!}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$game->links()}}
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#game_manage').addClass('current-active');
        $('#main,#profile_manage,#wallet_history,#sales_log,#upload_game,#game_report,#tag_manage').removeClass('current-active');
    </script>
@endsection