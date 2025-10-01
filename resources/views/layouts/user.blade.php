<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'User | HMTI')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/user.css') }}">
</head>
<body class="user">

    {{-- Navbar --}}
    @include('partials.user.navbar')

    {{-- Konten utama --}}
    <main class="container">
        @yield('content')
    </main>

</body>
</html>
