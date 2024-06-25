@extends('layout')


@section('pagetitle')
    Loging page
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
<form action="{{route('login')}}" class="container w-50" method="POST" >
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please sign in or Sign up</h1>
    
    <div class="form-floating my-2">
        <input type="email" class="form-control" placeholder="name@example.com" name="email">
        <label for="useremail">Email address</label>
        <span class="text-danger">
            @error('useremail')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <label for="userpassword">Password</label>
        <span class="text-danger">
            @error('userpassword')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="form-check text-start my-3">
        <a href="{{route('forgottenpage')}}">Forget Password</a>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{route('signup')}}" class="btn btn-primary w-10 py-2">sign up</a>
        <button type="submit" class="btn btn-success w-10 mx-2 py-2">Login</button>
    </div>
</form>
@endsection