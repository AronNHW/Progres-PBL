@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Manajemen Prestasi</h1>
    <p class="mb-4">Daftar prestasi mahasiswa yang telah tercatat.</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Data Prestasi</h6>
            <a href="{{ route('admin.prestasi.create') }}" class="btn btn-primary btn-sm float-right">Tambah Prestasi</a>
        </div>
        <div class="card-body">
            <!-- Search Form -->
            <form method="GET" action="{{ route('admin.prestasi.index') }}" class="form-inline mb-3">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" placeholder="Cari Nama/NIM..." value="{{ request('search') }}">
                </div>
                <button type="submit" class="btn btn-primary ml-2">Cari</button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary ml-2">Reset</a>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Sistem Kuliah</th>
                            <th>IPK</th>
                            <th>Periode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($prestasis as $prestasi)
                            <tr>
                                <td>{{ $prestasi->nim }}</td>
                                <td>{{ $prestasi->nama }}</td>
                                <td>{{ $prestasi->sistem_kuliah }}</td>
                                <td>{{ $prestasi->ipk }}</td>
                                <td>{{ $prestasi->periode }}</td>
                                <td>
                                    <a href="{{ route('admin.prestasi.edit', $prestasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.prestasi.destroy', $prestasi->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $prestasis->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
