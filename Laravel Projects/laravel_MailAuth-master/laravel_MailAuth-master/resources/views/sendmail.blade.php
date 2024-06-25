@extends('layout')

@section('pagetitle')
    {{$data['title']}}
@endsection

@section('body')
    {{$data['body1']}}
    <br>
    <div style="font-size: 16px;">
        {{$data['otp']}}
    </div>
    {{$data['body2']}}
@endsection

