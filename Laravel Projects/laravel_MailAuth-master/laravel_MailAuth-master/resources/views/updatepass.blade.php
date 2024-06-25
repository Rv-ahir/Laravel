@extends('layout')


@section('pagetitle')
    Update your password
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
<form action="{{route('updatepass')}}" class=" container w-50" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please Sign up</h1>

    <div class="form-floating my-2">
        <input type="hidden" class="form-control" name="email" value="{{ $email }}">
        <input type="hidden" class="form-control" name="token" value="{{ $token }}">
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
        <a href="{{route('login')}}" class="btn btn-primary w-10 mx-2 py-2">Sign in</a>
        <button class="btn btn-success w-10 py-2">Update password</button>
    </div>
</form>
@endsection