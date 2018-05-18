@extends('layouts.common.master')

@section('style')
@endsection

@section('scripts')
<script type="text/javascript">
	$('#myWallet').addClass('current-active');
</script>
@endsection

@section('content')
<div class = 'row'>
	<div class="col-md-8 col-sm-12"> 
	<h4>Your wallet balance : {{Auth::user()->wallet}} $ </h4>
	<center><font color ="white" >Amount: {{Auth::user()->wallet}}$</font></center>
	<form class=" form-inline" action ="/addCash" method ="POST">
		<div class="form-group">
			{{ csrf_field()}}
			<input type = "text" class ="form-control" name = "Cquery"
			placeholder="Insert Amount..." size="40">
		</div>
			<button type = "submit" class= "btn btn-primary">
				<span class = "glyphicon glyphicon-plus-sign"> Add</span>
			</button>

	</form>

	<br><hr>
	<a href="{{route('profile.purchase_history')}}"><p>View purchase history</p></a>
	<a href="{{route('profile.wallet_history')}}"><p>View wallet history</p></a>
	</div>

	<div class="col-md-4 col-sm-12">
		<div>
			<p>Our contace info : hacktiegr1989@gmail.com</p>
			<p>Address : 221B BakerStreet</p>
		</div>
	</div>
</div>
@endsection