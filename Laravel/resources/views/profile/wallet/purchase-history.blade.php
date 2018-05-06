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
		<h4>{{Auth::user()->name}}`s Purchase History</h4>
		<table class="table table-sm table-hover" style="width: 90%;">
			<thead  style="background-color: #737373; color: white">
				<tr>
					<th> Item </th>
					<th> Price</th>
				</tr>
			</thead>
			<tbody>
				@foreach($result as $results)
				<tr class="content" >
					<td><b><h5>{{$results->game_title}}</h5></b></td>
					<td><b><h5>{{$results->price}}</h5></b></td>
				</tr>
				@endforeach
			</tbody>
		</table>
		{{$result->links()}}

		<br><hr>
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