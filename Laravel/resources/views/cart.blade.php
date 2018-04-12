@extends('layouts.common.master')
  <title>Cart</title>
@section('content')
<center><table style='width:80%'>
	<tr>
		<th><center>Title</center></th>
		<th><center>Tags</center></th>
		<th><center>Developer</center></th>
		<th><center>Price</center></th>
		<th><center>Discount</center></th>
		<th><center>Cancel Button</center></th>
	</tr>
	<tr>
	</tr>
</table></center>

<br><br>
<div class='wrapper' style='text-align:center'><div class="col-sm-2 col-md-2">
	<button type="button" class="btn btn-block btn-primary" data-toggle="modal" data-target="#myModal" style='position:absolute'>
	Pay
	</button>
</div></div>

@endsection
