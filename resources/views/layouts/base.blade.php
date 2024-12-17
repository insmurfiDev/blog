<!DOCTYPE html>
<html>

<head>
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    @include('layouts.header')
    @yield('content')
</body>

</html>
