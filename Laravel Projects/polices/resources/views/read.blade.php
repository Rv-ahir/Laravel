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
    <div class="container mt-5 text-center">
        <h2 class="text-center">User Details</h2>
        <a href="{{route('book.create')}}" class="btn btn-success mb-3"> Add Data</a>
        <div class="justify-content-center">
            @foreach ($user as $use)
                <div class="row  justify-content-center">
                    <!-- User 1 -->
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                {{ $use->title }}
                            </div>
                            <div class="card-body">
                                <p><strong>Price:</strong> {{ $use->price }}RS</p>
                                <p><strong>User ID:</strong>{{ $use->user_id }} </p>
                                @can('update',$use)
                                <a href="{{route('book.show',$use->id)}}" class="btn btn-secondary ">View</a>
                                <a href="{{route('book.edit',$use->id)}}" class="btn btn-primary">Update</a>
                                <form action="{{route('book.destroy',$use->id)}}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form> 
                                @else
                                <h2>not authorize</h2>
                                @endcan
                                
                                
                            </div>

                        </div>
                    </div>
            @endforeach
        </div>
</body>

</html>
