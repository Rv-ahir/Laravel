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
    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="photo">Upload an Image:</label>
        <input type="file" id="image" name="photo" accept="image/*" required> <br>
        <button type="submit">Upload</button>
    </form>
    @if (session('status'))
        <div class="alert">
            {{session('status')}}
        </div>
    @endif

    <div class="row">
    @foreach ($user as $use)
        

            <div class="col-2" >
                <span>
                    <img src="{{ asset('/storage/' . $use->photo) }}" alt="">
                </span><br>
                <span>
                    <form action="{{ route('user.destroy', $use->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger m-2">Delete</button>
                    </form>
                </span>
                <span>

                    <a href="{{route('user.edit',$use->id)}}" class="btn btn-primary m-2">Update</a>
                </span>
            </div>
        @endforeach
        </div>

</body>

</html>
