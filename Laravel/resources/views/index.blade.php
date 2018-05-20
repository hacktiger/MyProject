@extends('layouts.common.master')

@section('style')
<style type="text/css">
/** 
Card - BS 4
**/
.card{position:relative;display:-webkit-box;display:-ms-flexbox;display:flex;-webkit-box-orient:vertical;-webkit-box-direction:normal;-ms-flex-direction:column;flex-direction:column;min-width:0;word-wrap:break-word;background-color:#fff;background-clip:border-box;border:1px solid rgba(0,0,0,.125);border-radius:.25rem;
  transition: transform .8s;
}
.container .card:hover{
  -ms-transform: scale(1.1); /* IE 9 */
  -webkit-transform: scale(1.1); /* Safari 3-8 */
  transform: scale(1.1); 
}
.card>hr{margin-right:0;margin-left:0;}
.card>.list-group:first-child .list-group-item:first-child{border-top-left-radius:.25rem;border-top-right-radius:.25rem}
.card>.list-group:last-child .list-group-item:last-child{border-bottom-right-radius:.25rem;border-bottom-left-radius:.25rem}
.card-body{-webkit-box-flex:1;-ms-flex:1 1 auto;flex:1 1 auto;padding:1.25rem; }
.card-title{margin-bottom:.75rem}
.card-subtitle{margin-top:-.375rem;margin-bottom:0}
.card-text:last-child{margin-bottom:0}
.card-header{padding:.75rem 1.25rem;margin-bottom:0;background-color:rgba(0,0,0,.03);border-bottom:1px solid rgba(0,0,0,.125)}
.card-header:first-child{border-radius:calc(.25rem - 1px) calc(.25rem - 1px) 0 0}
.card-header+.list-group .list-group-item:first-child{border-top:0}
.card-footer{padding:.75rem 1.25rem;background-color:rgba(0,0,0,.03);border-top:1px solid rgba(0,0,0,.125)}
.card-footer:last-child{border-radius:0 0 calc(.25rem - 1px) calc(.25rem - 1px)}


.hover-row:hover{
  background-color: #f2f2f2;
  cursor: pointer;
}
/**  Make the cards the same height + does not break formation of divs  **/
.row {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display:         flex;
  flex-wrap: wrap;
}
.row > [class*='col-'] {
  display: flex;
  flex-direction: column;
}
</style>

@endsection
@section('scripts')
<script type="text/javascript">
  $('#home').addClass('current-active');
</script>
@endsection

@section('content')


@foreach($notification as $noti)

<div class="card"  style="padding: 5px; width: 80%;margin-left: 8%;    border-left: 6px solid red;
    background-color: lightgrey;" >
  <div class="card-header">
    <h5><a href="/notification/{{$noti->id}}"><?php $string1 = $noti->title; $sub = substr($string1,0,100); echo $sub;?></a></h5>
  </div>
  <div class="card-body">
    <a href="/notification/{{$noti->id}}"><p style="padding: 5px; color: #4d4d4d;font-weight:600;"><?php $string = $noti->text; $sub = substr($string,0,180); echo $sub."<b>  &nbsp; &nbsp; Read more...</b>";?></p></a>
  </div>
</div>

@endforeach
{{$notification->links()}}
<br><br>


<!-- prints out every game -->
<div class="container" style="width: 95%;">
  <div class="row ">
    @foreach($game as $games)
    <div class="col-lg-4 col-md-6 " >
      <!-- EACH GAME CARD -->
      <div class="card h-100" style="border-radius: 10px; border: 1px solid #ddd;width: 90%; margin-top: 30px; ">
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
          <p class="card-text"><?php $string = $games->description; $sub = substr($string,0,50); echo $sub;?></p>
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
