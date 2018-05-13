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
    animation: mymove 5s infinite;
    font-size: 40px; 
}
@-webkit-keyframes mymove {
    from {text-shadow: -2px -4px #ff8000;}
    to {text-shadow: 2px -4px #ff8000;}
    to {text-shadow: -2px -4px #ff8000;}
}

</style>
@endsection
@section('content')
<div class="container-fluid cus-greeting">
    <p style=""> WELCOME TO GAMESTOP !</p>
</div>
@endsection
