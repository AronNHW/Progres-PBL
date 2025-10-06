@extends('layouts.pengurus')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Edit Prestasi</h1>
    <p class="mb-4">Ubah data pada formulir di bawah ini untuk mengedit data prestasi mahasiswa.</p>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Edit Prestasi</h6>
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

            <form action="{{ route('pengurus.prestasi.update', $prestasi->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim', $prestasi->nim) }}" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama Mahasiswa</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $prestasi->nama) }}" required>
                </div>
                <div class="form-group">
                    <label for="sistem_kuliah">Sistem Kuliah</label>
                    <input type="text" class="form-control" id="sistem_kuliah" name="sistem_kuliah" value="{{ old('sistem_kuliah', $prestasi->sistem_kuliah) }}" required>
                </div>
                <div class="form-group">
                    <label for="ipk">IPK</label>
                    <input type="number" step="0.01" class="form-control" id="ipk" name="ipk" value="{{ old('ipk', $prestasi->ipk) }}" required>
                </div>
                <div class="form-group">
                    <label for="periode">Periode</label>
                    <input type="text" class="form-control" id="periode" name="periode" value="{{ old('periode', $prestasi->periode) }}" placeholder="Contoh: 2023/2024 Genap" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('pengurus.prestasi.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>
@endsection
