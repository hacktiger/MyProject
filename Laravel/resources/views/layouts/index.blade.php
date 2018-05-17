@extends('layouts.app')

@section('style')


<style type="text/css">
.cus-greeting{
    margin-left: 22%;
    margin-top: 10%;
    color: white;

}
p{
    -webkit-animation: mymove 5s infinite; /* Chrome, Safari, Opera */
    animation: mymove 1s infinite;
    font-size: 40px; 
}
@-webkit-keyframes mymove {
    0%   {text-shadow: 1px -3px #ff8000;}
    25%  {text-shadow: -2px -2px #ff8000;}
    50%  {text-shadow: 3px -1px #ff8000;}
    75%  {text-shadow: -2px 0px #ff8000;}
    100% {text-shadow: 1px -2px #ff8000;}
}
a{
    list-style-type: none;
    color:white;
}
a:hover{
    list-style-type: none;
    color: white;
}



</style>
@endsection
@section('content')
<div class="container-fluid cus-greeting">
    <p style=""> WELCOME TO GAMESTOP !</p>
    @guest
    <p>Register/Login first</p>
    @else
    <button class="btn btn-primary"><a href="/games">Explore GameStop</a></button>
    @endguest
</div>
@endsection
