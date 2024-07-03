@extends('structure')



@section('pagetitle')
<h1 align="center">Home Page</h1>
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Welcome</h2>
            <div class="d-flex justify-content-between mt-5">
                <a href="{{route('login')}}" class="btn btn-primary">Login</a>
                <a href="{{route("register")}}" class="btn btn-secondary">Registration</a>
            </div>
        </div>
    </div>
</div>
@endsection
   
