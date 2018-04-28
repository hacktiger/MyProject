@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4 class="text-center">You are logged in!</h4>
                    <br>
                    <a class="btn-block btn btn-primary" href="backHome">Check out our games</a>
                    @if(Auth::user()->auth_level == 'admin')
                    <a class="btn btn-block btn-danger" href="/admin">Enter Admin Dashboard</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
