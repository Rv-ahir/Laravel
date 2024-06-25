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
        <h2 class="text-center">Book Add Form</h2>
        <form action="{{route('book.update',$user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required value="{{$user->title}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input type="text" class="form-control" id="price" name="price" required value="{{$user->price}}">
            </div>
            <div class="form-group">
                <label for="user_id">User ID</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="1" {{$user->user_id==1?'selected':""}}>1</option>
                    <option value="2"  {{$user->user_id==2?'selected':""}}>2</option>
                    <option value="3"  {{$user->user_id==3?'selected':""}}>3</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Submit</button>
        </form>
    </div>
</body>
</html>