@extends('admin.admin')

@section('styles')
<style type="text/css">


</style>
@endsection
@section('content')
<div class="row">
	<div class="col-md-8">
		<h2>{{$notification->title}}</h2>
		<p style="word-wrap: break-word;">{{$notification->text}}</p>
	</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">
    $('#notification').addClass('current-active');
</script>
@endsection