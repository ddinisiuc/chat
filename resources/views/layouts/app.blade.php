<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>
    <div id="app">
        @if (!Auth::check())
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('sign_google') }}">Login with Google</a>
            <a href="{{ route('sign_facebook') }}">Login with facebook</a>
        @else
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button>Logout</button>
            </form>
        @endif

        @yield('content')
    </div>
    <script src="{{ asset('js/manifest.js') }}"></script>
    <script src="{{ asset('js/vendor.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
