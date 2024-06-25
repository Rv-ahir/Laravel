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
        <h1 class="text-center" > User Post</h1>
        @foreach ($user as $use )
        
        <p> <strong>Title:</strong>{{$use->title}}</p>
        <p> <strong>Content: </strong>{{$use->content}}</p>
        <hr>

        @endforeach
        
    </div>
</body>
</html>