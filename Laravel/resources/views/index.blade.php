@extends('layouts.common.master')

@section('style')
<style type="text/css">
/** 
Card - BS 4
**/
.card{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem}
.card>hr{margin-right:0;margin-left:0}
.card>.list-group:first-child .list-group-item:first-child{border-top-left-radius:.25rem;border-top-right-radius:.25rem}
.card>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:.25rem;border-bottom-left-radius:.25rem}
.card-body{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem}
.card-title{margin-bottom:.75rem}
.card-subtitle{margin-top:-.375rem;margin-bottom:0}
.card-text:last-child{margin-bottom:0}
.card-header{padding:.75rem 1.25rem;margin-bottom:0;background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.125)}
.card-header:first-child{border-radius:calc(.25rem - 1px) calc(.25rem - 1px) 0 0}
.card-header+.list-group .list-group-item:first-child{border-top:0}
.card-footer{padding:.75rem 1.25rem;background-color:rgba(0,0,0,.03);border-top:1px solid rgba(0,0,0,.125)}
.card-footer:last-child{border-radius:0 0 calc(.25rem - 1px) calc(.25rem - 1px)}



.carousel-caption {
  top: 0;
  bottom: auto;
}
.hover-row:hover{
  background-color: #f2f2f2;
  cursor: pointer;
}
</style>

@endsection
@section('scripts')
<script type="text/javascript">
  $('#home').addClass('current-active');
</script>
@endsection

@section('content')

<div style=" border: 1px solid #737373;
    border-radius: 5px;" style="width: 90%">
  @foreach($notification as $noti)
    <div style="padding: 5px">
      <h5><a href="/notification/{{$noti->id}}">{{$noti->title}}</a></h5>
      <p style="padding: 5px; color: #4d4d4d;font-weight:600;"><?php $string = $noti->text; $sub = substr($string,0,180); echo $sub;?></p>
    </div> 
  @endforeach
</div>
<br><br>

<h1><center>Ongoing Sales</center></h1>
<div class="container" style="width: 90%;">
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
      <!-- Add real sales later here -->
      {{-- @foreach($sales as $sale)

      @endforeach --}}

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
      <div class="col-lg-4 col-md-4 col-sm-12" style="margin-top:30px;">
        <div class="card h-100" style="border-radius: 10px; border: 1px solid #ddd;width: 90%;">
          <!-- IMG -->
          <a href="/games/{{$games->slug}}">
            <div style="">
              <img style="border-top-left-radius: 10px; border-top-right-radius: 10px; border: 1px solid #ddd; max-height: 140px;width: 100% " src="/storage/cover_images/{{$games->image}}" class="card-img-top" alt="{{$games->title}}">
            </div>
          </a>
          <!-- Body -->
          <div class="card-body">
            <h4 class="card-title"><a href="/games/{{$games->slug}}">{{$games->title}}</a></h4>
            @if ( $games->sales ==0)
            <h5>Price : <b>{{$games->price}}$</b></h5>
            @endif
            @if ( $games->sales != 0)
            <h5>Price : <s>{{$games->price}}$</s> <font color = 'red'><b>{{$games->price - $games->sales}}$</b></font><small>  On Sale</small></h5>
            @endif
            <p class="card-text"><?php $string = $games->description; $sub = substr($string,0,70); echo $sub;?></p>
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

  {{ $game->links() }}
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