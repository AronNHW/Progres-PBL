<aside class="sidebar">
   <div class="sidebar-header">
    <img src="{{ asset('assets/image/logo_hima.png') }}" alt="Logo HMTI" class="logo">
    <i class="fas fa-bars menu-icon"></i>
</div>

  <nav class="sidebar-nav">
    <ul>
      <li>
        <a href="{{ route('pengurus.dashboard') }}" class="{{ request()->routeIs('pengurus.dashboard') ? 'active' : '' }}">
          <i class="fas fa-home-alt nav-icon"></i><span class="menu-text"> Dashboard</span>
        </a>
      </li>

      <li class="nav-title">Pengurus</li>

      <li><a href="#"><i class="fas fa-user nav-icon"></i><span class="menu-text"> Data User</span></a></li>
      <li><a href="#"><i class="fas fa-users nav-icon"></i><span class="menu-text"> Data Anggota Hima-TI </span><i class="fas fa-chevron-down arrow-icon"></i></a></li>
      <li><a href="#"><i class="fas fa-sitemap nav-icon"></i><span class="menu-text"> Data Divisi</span></a></li>
      <li><a href="#"><i class="fas fa-user-friends nav-icon"></i><span class="menu-text"> Data Anggota Per-Divisi</span></a></li>
      <li><a href="#"><i class="fas fa-trophy nav-icon"></i><span class="menu-text"> Data Prestasi Mahasiswa </span></a></li>
      <li><a href="{{ route('pengurus.berita.index') }}" class="{{ request()->routeIs('pengurus.berita.*') ? 'active' : '' }}"><i class="fas fa-newspaper nav-icon"></i><span class="menu-text"> Data Berita</span></a></li>
      <li><a href="{{ route('pengurus.aspirasi.index') }}" class="{{ request()->routeIs('pengurus.aspirasi.*') ? 'active' : '' }}"><i class="fas fa-bullhorn nav-icon"></i><span class="menu-text"> Data Aspirasi</span></a></li>
      <li><a href="#"><i class="fas fa-cog nav-icon"></i><span class="menu-text"> Setting </span><i class="fas fa-chevron-down arrow-icon"></i></a></li>
    </ul>
  </nav>
</aside>
