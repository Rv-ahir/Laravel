@extends('structure')


@section('pagetitle')
    <h1 align="center">Register Page</h1>
@endsection

@section('main')
    <div class="container mt-5">

        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
            <!-- Text Input -->
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
            </div>

            @error('name')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
            </div>

            @error('email')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror


            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password"
                    placeholder="Enter your password">
            </div>

            @error('password')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Password Input -->
            <div class="mb-3">
                <label for="password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                    placeholder="Enter your confirm password">
            </div>

            <!-- Date Input -->
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
            </div>

            @error('dob')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Select Dropdown -->
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" id="gender" name="gender">
                    <option selected disabled>Choose...</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            @error('gender')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Radio Buttons -->
            <div class="mb-3">
                <label class="form-label">Subscription</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="subscription" id="basic" value="basic">
                    <label class="form-check-label" for="basic">Basic</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="subscription" id="premium" value="premium">
                    <label class="form-check-label" for="premium">Premium</label>
                </div>
            </div>

            @error('subscription')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Checkboxes -->
            <div class="mb-3">
                <label class="form-label">Preferences</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="news" name="preferences[]" value="news">
                    <label class="form-check-label" for="news">News</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="updates" name="preferences[]" value="updates">
                    <label class="form-check-label" for="updates">Updates</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="offers" name="preferences[]" value="offers">
                    <label class="form-check-label" for="offers">Special Offers</label>
                </div>
            </div>

            @error('preferences')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror



            <!-- Textarea -->
            <div class="mb-3">
                <label for="comments" class="form-label">Comments</label>
                <textarea class="form-control" id="comments" name="comments" rows="3" placeholder="Enter your comments"></textarea>
            </div>

            @error('comments')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- File Input -->
            <div class="mb-3">
                <label for="file" class="form-label">Upload Image</label>
                <input class="form-control" type="file" id="file" name="photo" accept="image/*">
            </div>

            @error('photo')
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('login')}}" class="btn btn-success ">Login</a>
        </form>
    </div>
@endsection
