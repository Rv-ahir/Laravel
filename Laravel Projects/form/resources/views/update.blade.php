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
       <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="mt-5">Login Form</h1>
                <form action="{{route('user.update',$user->id)}}" method="POST">
                    @csrf

                    @method('PUT')
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control"  placeholder="Enter name" name="name" value="{{$user->name}}">
                        <label for="name">Name</label>
                    </div>
                    <span class="text-danger">
                        @error('name')
                            {{$message}}
                        @enderror

                    </span>

                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" placeholder="Enter email" name="email" value="{{$user->email}}">
                        <label for="email">Email</label>
                    </div>

                    <div class="text-danger">
                        @error('email')
                            {{$message}}
                        @enderror
                    </div>
                    


                    <div class="form-floating mb-3 mt-3">
                        <input type="date" class="form-control" placeholder="Enter birthdate" name="birthdate" value="{{$user->birthdate}}">
                        <label for="birthdate">Birthdate</label>
                    </div>

                    <div class="text-danger">
                        @error('birthdate')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" placeholder="Enter password" name="password" value="{{$user->password}}">
                        <label for="password">Password</label>
                    </div>

                    <div class="text-danger">
                        @error('password')
                            {{$message}}
                        @enderror
                    </div>

                    <div class="form-floating mt-3 mb-3">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password_confirmation" value="{{$user->confirm_password}}">
                        <label for="password_confirmation">Password</label>
                    </div>

                    <div class="form-floating mb-3 mt-3">
                        <select class="form-select"  name="select" >
                            <option value="null"></option>
                          <option value="Indai" {{$user->country =='Indai'?'selected':''}}>Indai</option>
                          <option value="Pakistan" {{$user->country =='Pakistan'?'selected':''}}>Pakistan</option>
                          <option value="Japan" {{$user->country =='japan'?'selected':''}}>Japan</option>
                          <option value="America" {{$user->country =='America'?'selected':''}}>America</option>
                        </select>
                        <label for="select" class="form-label">Select your country</label>
                    </div>

                    <div class="text-danger">
                        @error('select')
                            {{$message}}
                        @enderror
                    </div>

                    <h2>Select your hobby </h2>

                    

                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check1" name="hobby[]" value="reading" {{in_array('reading',$hobby)? 'checked':''}} >
                        <label class="form-check-label" for="reading">reading</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="check2" name="hobby[]" value="music" {{in_array('music',$hobby)? 'checked':''}}>
                        <label class="form-check-label" for="music">music</label>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="gaming" name="hobby[]" value="gaming" {{in_array('gaming',$hobby)? 'checked':''}}>
                        <label class="form-check-label" for="gaming">gaming</label>
                    </div>

                    <div class="text-danger">
                        @error('hobby')
                            {{$message}}
                        @enderror   
                    </div>


                    <h2>Select your gender</h2>
                    
                  

                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio1" name="gender" value="male" {{$user->gender =='male'?'checked':''}}>male
                        <label class="form-check-label" for="male"></label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="radio2" name="gender"  value="female" {{$user->gender =='female'?'checked':''}}>female
                        <label class="form-check-label" for="female"></label>
                    </div>

                    <div class="text-danger">
                        @error('gender')
                            {{$message}}
                        @enderror
                    </div>
            
                    
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>


                </form>
            </div>
        </div>
    </div>
</body>
</html>