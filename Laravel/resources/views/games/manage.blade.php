@extends('admin.admin')

@section('styles')
<style type="text/css">
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 80%;
}

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

<!-- prints out every tags -->
<div class="col">
    <div class="col-md-8 col-sm-8">
        <table class="table table-sm table-hove">
            <thead class="thead-dark">
                <tr>
                    <th>Game Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>

            <tbody>
                @foreach($game as $games)
                <tr>
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
        $('#main,#profile_manage,#upload_game,#game_report,#tag_manage').removeClass('current-active');
    </script>
@endsection