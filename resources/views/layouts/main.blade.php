<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie app</title>
    <link rel="stylesheet" href="/css/main.css">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex items-center justify-between px-4 py-6">
            <ul class="flex items-center">
                <li>
                    <a href="{{ route('movies.index') }}">
                        MovieProject
                    </a>
                </li>
                <li class="ml-16">
                    <a href="{{ route('movies.index') }}" class="hover:text-gray-300">Фильмы</a>
                </li>
                <li class="ml-6">
                    <a href="{{ route('actors.index') }}" class="hover:text-gray-300">Актеры</a>
                </li>
            </ul>
            <div class="flex items-center">
                <livewire:search-list>

            </div>
        </div>
    </nav>
    @yield('content')
    @livewireScripts
    @yield('scripts')
</body>
</html>
