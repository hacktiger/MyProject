@extends('layouts.common.master')



@section('content')
	<section id="registerForm" class="container">
	<div class="card">
		<!--header-->
		<div class="card-header bg-primary ">
			<h3 class="font-weight-bold text-center  text-white">Header</h3>
		</div>
		<!-- Main card form -->
		<div class="card-body">
		<form method="post">
			<div class="form-group">
			    <label for="email">Email address:</label>
			    <input type="email" class="form-control" id="email" placeholder="Enter your e-mail">
			</div>

			<div class="form-group">
			    <label for="pwd">Password:</label>
			    <input type="password" class="form-control" id="pwd"
			    placeholder="Enter password">
			</div>

			<div  class="form-check">
			    <label class="form-check-label">
			    	<input class="form-check-input" type="checkbox"> Remember me
			    </label>
			</div>
			<!-- Submit -->
			<button type="submit" id="submit" class="btn btn-primary btn-block">Submit</button>
		</form>
		</div>
		<!-- Footer -->
		<div class="card-footer bg-primary">
			<p class="text-right card-text  text-white">Already a Member? <a href="./index" class="text-white"><b>(&ensp;Login &ensp;)</b></a></p>
		</div>
	</div>
	</section>
@endsection