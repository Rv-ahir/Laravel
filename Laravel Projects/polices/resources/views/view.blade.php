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
    <div class="container-fluid m-5">
        <h1 class="text-center text-danger">User Details</h1>
        <h1>Title:{{$user->title}}<h1>
            <hr>
        <h1>Price:{{$user->price}}rs<h1>
            <hr>
        <h1>User_id:{{$user->user_id}}<h1>
    </div>
</body>
</html>