@extends('layouts.common.master')

@section('style')
@endsection

@section('scripts')
<script type="text/javascript">
	$('#myWallet').addClass('current-active');
</script>
@endsection

@section('content')
<div class = 'container'>
	Your wallet : {{Auth::user()->wallet}} $
	<center><font color ="white" >Amount: {{Auth::user()->wallet}}$</font></center>
	<form action ="/addCash" method ="POST">
		{{ csrf_field()}}
		<input type = "text" class ="form-control" name = "Cquery"
		placeholder="Insert Amount...">
		<span class = "input-group-btn">
			<button type = "submit" class= "btn btn-primary btn-block">
				<span class = "glyphicon glyphicon-search"> Add</span>
			</button>
		</span>
	</form>
</div>
@endsection