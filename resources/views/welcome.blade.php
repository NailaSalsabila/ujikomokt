<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap\css\bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Home</title>
</head>
<body>
    @include('template.nav')
    {{-- <img src="img/sp.jpg" class="w-100" alt=""> --}}
    @include('template.car')
    @if (Session::has('status'))
    <div class="alert alert-success"><span>{{ Session::get('status') }}</span></div>
    @endif
    @include('template.card')
    <script src="{{ asset('bootstrap\js\bootstrap.bundle.min.js') }}"></script>
</body>
</html>