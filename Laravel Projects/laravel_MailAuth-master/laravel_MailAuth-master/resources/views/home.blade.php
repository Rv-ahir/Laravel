@extends('layout')

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

<div>home page</div>

