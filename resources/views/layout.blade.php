<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movie Database | @yield('title')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="h-screen">
@include('components.header')
@yield('content')
@livewireScripts
</body>
</html>
