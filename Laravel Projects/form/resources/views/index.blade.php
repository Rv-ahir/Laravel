<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="mt-5" align="center">User Data</h1>
                <a href="{{route("user.create")}}" class="btn btn-success mb-3" align="center">Add Data</a>
                <table class="table table-bordered table-striped table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Birthdate</th>
                        <th>Password</th>
                        <th>Confirm_password</th>
                        <th>Country</th>
                        <th>Hobby</th>
                        <th>Gender</th>
                        <th>Update</th>
                        <td>Delete</td>
                    </tr>
                    @foreach ($user as $use )
                        <tr>
                            <td>{{$use->id}}</td>
                            <td>{{$use->name}}</td>
                            <td>{{$use->email}}</td>
                            <td>{{$use->birthdate}}</td>
                            <td>{{$use->password}}</td>
                            <td>{{$use->confirm_password}}</td>
                            <td>{{$use->country}}</td>
                            <td>{{$use->hobby}}</td>
                            <td>{{$use->gender}}</td>
                            <td align="center"><a href="{{ route('user.edit', $use->id) }}" class="btn btn-primary btn-sm" >Update</a></td>
                            <td align="center">
                                <form action="{{route('user.destroy',$use->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div>
                    {{$user->links('pagination::bootstrap-5')}}
                </div>
            </div>
        </div>
    </div>
</body>
</html>