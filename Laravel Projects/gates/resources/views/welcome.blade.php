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
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2>Welcome</h2>
                <p>Please choose an option:</p>
                <a href="{{route('registerpage')}}" class="btn btn-primary btn-lg mb-2">Sign Up</a>
                <a href="{{route('loginpage')}}" class="btn btn-secondary btn-lg mb-2">Login</a>
            </div>
        </div>
    </div>
    @if (session('status'))
    <div class="text-danger">
      <h1>  {{session('status')}}</h1>
    </div>
        
    @endif
</body>
</html>