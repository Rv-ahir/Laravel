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
    <div class="container mt-5">
        <h2 class="text-center">Sample Table</h2>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Id</th>
            <th>name</th>
            <th>email</th>
            <th>role</th>
            <th>update</th>
            <th>delete</th>
        </tr>
        @foreach ($user as $use )
        <tr>
            <td>{{$use->id}}</td>
            <td>{{$use->name}}</td>
            <td>{{$use->email}}</td>
            <td>{{$use->role}}</td>
            <td><a href="" class="btn btn-primary btn-sm">Update</a></td>
            <td><a href="" class="btn btn-danger btn-sm">Delete</a></td>
        </tr>
        @endforeach
       
    </table>
</div>
</body>
</html>