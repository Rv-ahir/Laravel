@extends('structure')


@section('pagetitle')
<h1 align="center">Login page</h1>
@endsection

@section('main')
@if (session('status'))
<div class="alert alert-success" align="center">
    {{session('status')}}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger" align="center">
    {{session('error')}}
</div>
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center mt-5">Login</h2>
            <form method="POST" action="{{route('logincheck')}}">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                </div>
                @error('email')
                <div class='text-danger'>
                    {{$message}}
                </div>
                    
                @enderror
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" >
                </div>
                @error('password')
                <div class='text-danger'>
                    {{$message}}
                </div>
                    
                @enderror
                <button type="submit" class="btn btn-primary mt-2">Login</button>
               <a href="{{route('register')}}" class="btn btn-success mt-2">Sign up</a>
            </form>
        </div>
    </div>
</div>
@endsection
   
