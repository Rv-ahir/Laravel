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
            <div class="col-4 mt-5">
                <h1>Add Data Form</h1>
                <form action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label for="" class="form-label" >Name</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    <label for="" class="form-label">City</label>
                    <input type="text" name="city" class="form-control" value="{{$user->city}}">
                    <input type="submit" name="submit" class="btn btn-primary mt-2">
                </form>
            </div>
        </div>
    </div>
</body>
</html>