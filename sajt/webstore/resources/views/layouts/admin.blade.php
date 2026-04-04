<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel App') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])


</head>

<body class="bg-gray-100 text-gray-800 min-h-screen flex flex-col">

@include('admin.fixed.navigation')

<main class="flex-1 container-fluid px-4 pt-3">
    @yield('content')
</main>

<!-- footer -->

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/15f9d8d9b7.js" crossorigin="anonymous"></script>
</body>
</html>

