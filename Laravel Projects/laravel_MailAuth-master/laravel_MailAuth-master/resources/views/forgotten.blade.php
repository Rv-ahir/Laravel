@extends('layout')

@section('pagetitle')
    forgotten Page
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
<form action="{{route('forgotemail')}}" class="container w-50" method="POST" >
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please enter the email id</h1>
    
    <div class="form-floating my-2">
        <input type="email" class="form-control" placeholder="name@example.com" name="email">
        <label for="useremail">Email address</label>
        <span class="text-danger">
            @error('useremail')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="d-flex justify-content-end">
        <a href="{{route('login')}}" class="btn btn-primary w-10 py-2">Signin</a>
        <button type="submit" class="btn btn-success w-10 mx-2 py-2">Forgott Password</button>
    </div>
</form>
@endsection