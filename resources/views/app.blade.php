<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{config('app.name')}}</title>

    @viteReactRefresh
    @vite('resources/js/app.tsx')
    @inertiaHead

    <style>
        html, body, #app {
            min-width: 100vw;
            min-height: 100vh !important;
        }
    </style>
</head>
<body>
    @inertia
</body>
</html>
