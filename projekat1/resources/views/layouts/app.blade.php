<?php

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>

    @yield('head')

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('fixed.navigation')

@yield('content')

@include('fixed.footer')

</body>
</html>

