@extends('layout')

@section('pagetitle')
    {{$data['title']}}
@endsection

@section('body')
    {{$data['body1']}}
    <br>
    <div style="font-size: 16px;">
        <a href="{{route('forgotlink', ['token'=>$data['token'],'email'=>$data['email']])}}">Reset Password</a>
    </div>
    {{$data['body2']}}
@endsection

