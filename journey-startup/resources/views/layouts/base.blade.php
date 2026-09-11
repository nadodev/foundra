<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Foundra')</title>

    {{-- Google Fonts: Sora (headings) + Inter (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@600;700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    {{-- Styles & Scripts with Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>
<body class="@yield('body-class', '')">
    @yield('body')

    @stack('scripts')
</body>
</html>
