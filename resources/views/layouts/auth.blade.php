<!DOCTYPE html>
<html class="h-full bg-gray-50">

<head>
    <title>@yield('title')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    @yield('content')
</body>

</html>
