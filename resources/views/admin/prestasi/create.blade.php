@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Tambah Prestasi Baru</h1>
    <p class="mb-4">Isi formulir di bawah ini untuk menambahkan data prestasi mahasiswa.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Prestasi</h6>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.prestasi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                </div>
                <div class="form-group">
                    <label for="sistem_kuliah">Sistem Kuliah</label>
                    <input type="text" class="form-control" id="sistem_kuliah" name="sistem_kuliah" value="{{ old('sistem_kuliah') }}" required>
                </div>
                <div class="form-group">
                    <label for="ipk">IPK</label>
                    <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="{{ old('ipk') }}" required>
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <input type="text" class="form-control" id="periode" name="periode" value="{{ old('periode') }}" placeholder="Contoh: 2023/2024 Genap" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('admin.prestasi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
