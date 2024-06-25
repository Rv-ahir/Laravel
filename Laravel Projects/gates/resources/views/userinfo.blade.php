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
        <h2 class="text-center">User Details</h2>
        <div class="row">
            <!-- User 1 -->
            <div class="col-12">
                <div class="card mb-4 justify-content-center">
                    <div class="card-header">
                       <strong>{{Auth::user()->name}}</strong> 
                    </div>
                    <div class="card-body">
                        <p><strong>Email:</strong>{{Auth::user()->email}}</p>
                        <hr>
                        <p><strong>Age:</strong>{{Auth::user()->age}}</p>
                        <hr>
                        <p><strong>Role:</strong>{{Auth::user()->role}}</p>
                        <hr>
                        <p><strong>News: <a href="{{route('news')}}" class="btn btn-success">Your News</a></p>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


{{-- 
    <div class="container mt-5">
        <h2 class="text-center">Sample Table</h2>
    <table class="table table-bordered table-striped table-hover">
        <tr>
            <th>Name:</th>
            <th>Email:</th>
            <th>Age:</th>
            <th>Role:</th>
        </tr>
        
        <tr>
            <td>{{Auth::user()->name}}</td>
            <td>{{Auth::user()->email}}</td>
            <td>{{Auth::user()->age}}</td>
            <td>{{Auth::user()->role}}</td>
        </tr>
       
       
    </table>
</div> --}}
   
</body>
</html>