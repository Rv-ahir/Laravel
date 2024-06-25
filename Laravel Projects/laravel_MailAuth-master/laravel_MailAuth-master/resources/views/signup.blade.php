@extends('layout')


@section('pagetitle')
    Sign Up page
@endsection

@section('message')
    @if (session('success'))
        <div class="alert alert-sucess">
            {{session('success')}}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
@endsection


@section('form')
<form action="{{route('register')}}" class=" container w-50" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please Sign up</h1>
    
    <div class="form-floating my-2">
        <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="name" name="username">
        <label for="username">User name</label>
        <span class="text-danger">
            @error('username')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-floating my-2">
        <input type="email" class="form-control @error('useremail') is-invalid @enderror" placeholder="Email address" name="useremail">
        <label for="useremail">Email address</label>
        <span class="text-danger">
            @error('useremail')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-floating my-2">
        <input type="password" class="form-control @error('userpassword') is-invalid @enderror" placeholder="" name="userpassword">
        <label for="userpassword">Password</label>
        <span class="text-danger">
            @error('userpassword')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-floating my-2">
        <input type="password" class="form-control" placeholder="ConfirmPassword" name="userpassword_confirmation">
        <label for="userpassword_confirmation">Confirm Password</label>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{route('login')}}" class="btn btn-primary w-10 mx-2 py-2">Login</a>
        <button class="btn btn-success w-10 py-2">Sign up</button>
    </div>
</form>
@endsection