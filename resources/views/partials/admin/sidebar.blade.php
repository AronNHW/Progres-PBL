<aside class="sidebar">
   <div class="sidebar-header">
    <img src="{{ asset('assets/image/logo_hima.png') }}" alt="Logo HMTI" class="logo">
    <i class="fas fa-bars menu-icon"></i>
</div>

  <nav class="sidebar-nav">
    <ul>
      <li>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
          <i class="fas fa-home-alt nav-icon"></i><span class="menu-text"> Dasbor</span>
        </a>
      </li>

      <li class="nav-title">Admin</li>

      <li><a href="#"><i class="fas fa-user nav-icon"></i><span class="menu-text"> Data Pengguna</span></a></li>
      <li>
        <details open>
          <summary><i class="fas fa-users nav-icon"></i><span class="menu-text">Data Anggota Hima-TI</span><i class="fas fa-chevron-down arrow-icon"></i></summary>
          <nav class="items">
            <a href="{{ route('admin.kelola-anggota-himati.index') }}" class="{{ request()->routeIs('admin.kelola-anggota-himati.index') ? 'active' : '' }}">Kelola Anggota</a>
            <a href="{{ route('admin.calon-anggota.index') }}" class="{{ request()->routeIs('admin.calon-anggota.index') ? 'active' : '' }}">Pendaftaran Awal</a>
            <a href="{{ route('admin.calon-anggota-tahap-1.index') }}" class="{{ request()->routeIs('admin.calon-anggota-tahap-1.index') ? 'active' : '' }}">Hasil Tahap 1</a>
            <a href="{{ route('admin.calon-anggota-tahap-2.index') }}" class="{{ request()->routeIs('admin.calon-anggota-tahap-2.index') ? 'active' : '' }}">Hasil Tahap 2</a>
          </nav>
        </details>
      </li>
      <li><a href="#"><i class="fas fa-sitemap nav-icon"></i><span class="menu-text"> Data Divisi</span></a></li>
      <li><a href="#"><i class="fas fa-user-friends nav-icon"></i><span class="menu-text"> Data Anggota Per-Divisi</span></a></li>
      <li><a href="{{ route('admin.prestasi.index') }}" class="{{ request()->routeIs('admin.prestasi.*') ? 'active' : '' }}"><i class="fas fa-trophy nav-icon"></i><span class="menu-text"> Data Prestasi Mahasiswa </span></a></li>
      <li><a href="{{ route('admin.mahasiswa-bermasalah') }}" class="{{ request()->routeIs('admin.mahasiswa-bermasalah') ? 'active' : '' }}"><i class="fas fa-exclamation-triangle nav-icon"></i><span class="menu-text"> Mhs. Bermasalah</span></a></li>
      <li><a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.*') ? 'active' : '' }}"><i class="fas fa-newspaper nav-icon"></i><span class="menu-text"> Data Berita</span></a></li>
      <li><a href="{{ route('admin.aspirasi.index') }}" class="{{ request()->routeIs('admin.aspirasi.*') ? 'active' : '' }}"><i class="fas fa-bullhorn nav-icon"></i><span class="menu-text"> Data Aspirasi</span></a></li>
      <li><a href="#"><i class="fas fa-cog nav-icon"></i><span class="menu-text"> Pengaturan </span><i class="fas fa-chevron-down arrow-icon"></i></a></li>
    </ul>
  </nav>
</aside>