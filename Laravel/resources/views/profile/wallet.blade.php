@extends('layouts.common.master')

@section('style')
@endsection

@section('scripts')
<script type="text/javascript">
	$('#myWallet').addClass('current-active');
	//get current money -> php var to js var
	<?php
	$phpVar = Auth::user()->wallet;
	echo "var current_money = '{$phpVar}';";	
	?>
	// get input amount
	$('input').keyup(function(){
		var enter_amount = $(this).val();
		if(enter_amount + current_money > 9999.99){
			$('#cash_input').addClass('disabled');
			$('#amount_error').text('The maximum balance cant be over 9999.99');
		}
	});




</script>
@endsection

@section('content')
<div class = 'row'>
	<div class="col-md-8 col-sm-12"> 
		<h4>Your wallet balance : {{Auth::user()->wallet}} $ </h4>
		<center><font color ="white" >Amount: {{Auth::user()->wallet}}$</font></center>
		
		<i><span id="amount_error" style="color:red;"></span></i>
		<form class=" form-inline" action ="/addCash" method ="POST">
			<div class="form-group">
				{{ csrf_field()}}
				<input  type = "text" class ="form-control" name = "Cquery"
				placeholder="Insert Amount..." size="40">
			</div>
			<button id="cash_input" type = "submit" class= "btn btn-primary active">
				<span class = "glyphicon glyphicon-plus-sign"> Add</span>
			</button>

		</form>
		<br><hr>
		<p>Our contace info : hacktiegr1989@gmail.com</p>
		<p>Address : 221B BakerStreet</p>

	</div>

	<div class="col-md-4 col-sm-12">
			<a href="{{route('profile.purchase_history')}}"><p>View purchase history</p></a>
			<a href="{{route('profile.wallet_history')}}"><p>View wallet history</p></a>
	</div>
</div>
@endsection