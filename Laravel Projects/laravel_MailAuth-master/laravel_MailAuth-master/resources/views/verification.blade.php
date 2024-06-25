@extends('layout')


@section('pagetitle')
    verify Email address
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
<form action="{{route('verifyotp')}}" class="container w-50" method="POST">
    @csrf
    <h1 class="h3 mb-3 fw-normal">Please verify your OTP</h1>
    
    <div class="form-floating my-2">
        <input type="hidden" class="form-control" placeholder="name@example.com" name="useremail" value="{{$useremail}}">
        {{-- <label for="useremail">Email address</label> --}}
    </div>
    <div class="form-floating my-2">
        <input type="text" class="form-control" placeholder="name@example.com" name="userotp">
        <label for="floatingInput">Verification OTP</label>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary w-10 mx-2 py-2">Verified otp</button>
    </div>
</form>
@endsection

