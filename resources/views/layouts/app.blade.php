<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.partions.head')
</head>
<body>
    <div id="app">
       
    @include('layouts.partions.nav')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
