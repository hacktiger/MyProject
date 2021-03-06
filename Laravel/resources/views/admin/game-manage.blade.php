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
        <h1>Game Search</h1>
        {!! Form::open(['action'=>'SearchController@gameManageSearch', 'method'=>'POST','class'=>'form-inline'])!!}
        {{ Form::text('title', '', ['class'=>'form-control','placeholder'=>'Title Contains...', 'spellcheck'=>'false'])}}
        {{Form::submit('Search', ['class'=>'btn btn-primary'])}}
        {!!Form::close()!!}
    </div>
</div>
<br><br>
<!-- prints out every tags -->
<div class="row">
    <div class="col-md-8 col-sm-12">
        <table class="table table-sm">
            <thead >
                <tr>
                    <th>Game Title</th>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Approve Game</th>
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

                    
                    <th>
                    @if($games->approved =='N')
                        {!! Form::open(['action'=> ['GamesController@approve'], 'method'=>'POST']) !!}
                        {{ Form::text('title', $games->title, ['class'=>'form-control hidden'])}}
                        {{Form::submit('Approve Game', ['class'=>' btn  btn-primary'])}}
                        {!!Form::close() !!}
                    @endif
                    @if($games->approved == 'Y')
                        <button class="btn btn-light"> Approved </button>
                    @endif
                    </th>

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
    </script>
@endsection