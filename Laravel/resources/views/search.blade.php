@extends('layouts.common.master')
@section('style')
  <title>Search</title>
  <style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  </style>
@endsection

@section('scripts')
  <script src="./js/bootstrap.min.js"></script>
@endsection

  
@section('content')
<div class="container">
  <h2>Search</h2>
  <form action="">
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Enter Game's Name" name="search">
      <div class="input-group-btn">
        <button class="btn btn-default" type="submit"><i>Submit</i></button>
      </div>
    </div>
  </form>
</div>
<br>
<div class="container">
	<h2>Advanced Search</h2>
	<div class="row">
		<div class="col-md-6">
			Game Title contains
			<form action="">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="search">
				</div>
			</form>
			
			<div class="input-group-btn">
				<button class="btn btn-default" type="submit"><i>Submit</i></button>
			</div>
		</div>
		
		<div class="col-md-6">
			<div class="container">
				<h4>Tags</h4>
				<form>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Action</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Adventure
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">FPS
					</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Strategy</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">Strategy</label>
				</form>
				<h4>Minimum Score</h4>
				<form>
					<label class="checkbox-inline">
						<input type="checkbox" value="">1</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">2</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">3</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">4</label>
					<label class="checkbox-inline">
						<input type="checkbox" value="">5</label>
			</div>
		</div>
	</div>
</div>
@endsection
