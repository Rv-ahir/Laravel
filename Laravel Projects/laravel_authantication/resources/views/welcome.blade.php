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
            <div class="col-md-6">
                <h2 class="text-center mt-5">Welcome</h2>
                <div class="d-flex justify-content-between mt-5">
                    <a href="{{route('loginform')}}" class="btn btn-primary">Login</a>
                    <a href="{{route('register')}}" class="btn btn-secondary">Registration</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>