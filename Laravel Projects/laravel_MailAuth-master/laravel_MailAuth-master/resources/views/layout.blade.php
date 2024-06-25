<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>auth</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h3 class="text-center">@yield('pagetitle')</h3>
    </div>
    <div class="container">
        @yield('form')
    </div>
    <div class="container">
        @yield('verify')
    </div>
    <div class="container">
        @yield('body')
    </div>
    <div class="container">
        @yield('message')
    </div>
</body>
</html>