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
          <h2><font color=black> Developer Sale: Square Enix</font></h2>
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
<div class="container content-row">
  <div class="row">
    @foreach($game as $games)
      <div class="col-lg-4 col-md-6 mb-4" style="margin-top:30px;">
        <div class="card h-100" style="border-radius: 10px; border: 1px solid #ddd">
          <!-- IMG -->
          <a href="/games/{{$games->slug}}">
            <div style="">
              <img style="border-top-left-radius: 10px; border-top-right-radius: 10px; border: 1px solid #ddd; max-height: 140px" src="/storage/cover_images/{{$games->image}}" class="card-img-top" alt="{{$games->title}}">
            </div>
          </a>
          <!-- Body -->
          <div class="card-body">
            <h4 class="card-title"><a href="/games/{{$games->slug}}">{{$games->title}}</a></h4>
            <h5>Price : {{$games->price}}$</h5>
            <p class="card-text">something about this game that takes really long sentences</p>
          </div>
          <!-- Footer -->
          <div class="card-footer">
            <i class="fa fa-star pull-right" style="color: orange; padding-top: 2px;"></i><small class="pull-right">{{$games->avg_rating}}</small>
            <small >{{$games->upload_by}}</small>
          </div>
        </div>
      </div>
    @endforeach
  </div>
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