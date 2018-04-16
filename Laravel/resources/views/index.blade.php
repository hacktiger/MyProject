@extends('layouts.common.master')

@section('style')
<style type="text/css">
a:link{
  text-decoration: none;
}

a:hover{
  color: red;
}
.carousel-caption {
  top: 0;
  bottom: auto;
}
.hover-row:hover{
  background-color: #f2f2f2;
  cursor: pointer;
}




</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
@endsection
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
@endsection

@section('content')
<h1><center>Ongoing Sales</center></h1>
<div class="container">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox" style=" width:100%; height: 400px !important;">
      <div class="item active">
        <img src="https://i.imgur.com/qQIbhnJ.png" style="width:100%;">
        <div class="carousel-caption">
          <h2><font color=black> Developer Sale: Square Enix</font></h3>
          </div>
        </div>

        <div class="item">
          <img src="https://i.imgur.com/5keALkN.png" style="width:100%;">
        </div>
        
        <div class="item">
          <img src="https://i.imgur.com/cz8Cxmr.png" style="width:100%;">
        </div>
      </div>

      <!-- Left and right controls -->
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <br>

  
  <!-- prints out every game -->
<div class="container">
  <h3>All Games</h3>
  <table class="table border">
    <tbody>
      <tr>
        <td>Thumbnail</td>
        <td>Title</td>
        <td>Rating</td>
        <td>Developer</td>  
      </tr>
      <h2></h2>
      @foreach($game as $games)
      <tr  class="clickable-row hover-row" data-href="/games/{{$games->title}}">
        <td><img style="width:180px;height: 60px" src="/storage/cover_images/{{$games->image}}"></td>
        <td><a href="/games/{{$games->title}}">{{$games->title}}</a></td>
        <td>{{$games->avg_rating}} &ensp;<span class="fa fa-star" style="color:orange;"></span></td>
        <td>{{$games->upload_by}}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
 @endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
  });
</script>
@endsection