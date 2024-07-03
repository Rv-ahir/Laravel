@extends('structure')

@section('pagetitle')
<h1 align="center">Dashboard</h1>
@endsection

@section('main')
<div class="container-fluid  ">
    <div class="row justify-content-center">
        <div class="col-12">
            @include('crud/adddata')


            <table class="table table-bordered table-striped mt-2">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Gender</th>
                    <th>Subscription</th>
                    <th>Prefrences</th>
                    <th>Comments</th>
                    <th>image</th>
                    <th>Action</th>
                </tr>
                @foreach ($user as $use)
               
                  
                    <tr>
                        <td>{{ $use->id }}</td>
                        <td> {{ $use->name }}</td>
                        <td>{{ $use->email }}</td>
                        <td>{{ $use->DOB }}</td>
                        <td>{{ $use->gender }}</td>
                        <td>{{$use->subscription}}</td>
                        <td>{{$use->preferences}}</td>
                        <td>{{$use->comments}}</td>
                        <td><img src="{{ asset('/storage/' . $use->image) }}" alt="" width="150px" height="100px"></td>
                        <td align="center" style="">
                            @include('crud/updatedata')

                         

                            {{-- <form action="{{ route('info.destroy', $use->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form> --}}

                            @include('crud/deletedata')
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection