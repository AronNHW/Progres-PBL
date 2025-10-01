<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Dashboard Pengurus')</title>

  {{-- Fonts & Icons (sesuai file) --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

  {{-- CSS utama --}}
  <link rel="stylesheet" href="{{ asset('assets/css/pengurus.css') }}">
</head>
<body>
  @include('partials.pengurus.sidebar')

  <main class="main-content">
    <header class="topbar">
      <div class="user-profile">
        <span>Hi, Artha</span>
        <img src="https://i.pravatar.cc/150?u=artha" alt="User Avatar">
      </div>
    </header>

    <section class="dashboard-section">
      @yield('content')
    </section>
  </main>
</body>
</html>
