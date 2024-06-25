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
    <form action="{{route('user.update',$user->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <img src="{{asset('storage/'.$user->photo)}}" id="output" class="img-fluid img-thumbnail m-5" >
        </div>
        <label for="photo">Upload an Image:</label>
        <input type="file" id="image" name="photo" accept="image/*" onchange="document.querySelector('#output').src=window.URL.createObjectURL(this.files[0])"> <br>
        <button type="submit">Upload</button>
    </form>
    @if (session('status'))
        <div class="alert">
            {{session('status')}}
        </div>
    @endif


</script>
</body>
</html>