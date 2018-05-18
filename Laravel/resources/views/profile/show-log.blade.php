@extends('layouts.common.master')

@section('style')
<style type="text/css">
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


</style>
@endsection

@section('content')
<div class="card text-center">
  <div class="card-header">
    <h3>SALE LOG No : {{$log->id}}</h3> 
  </div>
  <div class="card-body">
    <h3 class="card-title">GameStop Game Purchase Bill</h3>
    <div class="card-subtitle">Username : {{$log->name}}</div>
    <!-- INFO OF THIS SALES LOG -->
    <div class="row" style="padding-bottom: 7%; padding-top:4% ">
    	<div class="col-lg-3 col-md-3 col-sm-12">
    		<h5>User E-mail : </h5><b><h4>{{$log->email}}</h4></b>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-12">
    		<h5>Game Title : </h5><b><h4>{{$log->game_title}}</h4></b>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-12">
    		<h5>Promotion :  </h5><b><h4>None</h4></b>
    	</div>
    	<div class="col-lg-3 col-md-3 col-sm-12">
    		<h5>Final Price : </h5><b><h4>{{$log->price}}</h4></b>
    	</div>
	</div>
    <!-- Created - at -->
    <p class="card-text">Bought at :{{$log->created_at}}</p>
    <a href="/my-purchase-history" class="btn btn-primary">Go back</a>
  </div>
  <div class="card-footer text-muted">
    copy right
  </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $('#sales_log').addClass('current-active');
        $('#main,#profile_manage,#upload_game,#game_report,#tag_manage,#wallet_history').removeClass('current-active');
    </script>
@endsection