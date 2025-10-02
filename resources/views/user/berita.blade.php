@extends('layouts.user')

@section('title', 'Berita')

@section('content')
    <div class="container">
        <h1 class="page-title">Berita Terbaru</h1>

        <div class="berita-grid">
            @forelse ($beritas as $berita)
                <div class="berita-card">
                    <img src="{{ asset('uploads/' . $berita->foto_berita) }}" alt="Foto Berita" class="card-img">
                    <div class="card-body">
                        <h2 class="card-title">{{ $berita->judul_berita }}</h2>
                        <p class="card-date">{{ $berita->created_at->format('d F Y') }}</p>
                        <p class="card-text">{{ Str::limit($berita->deskripsi, 100) }}</p>
                        <a href="#" class="btn-read-more">Baca Selengkapnya</a>
                    </div>
                </div>
            @empty
                <p>Belum ada berita.</p>
            @endforelse
        </div>
    </div>
@endsection

@push('styles')
<style>
.container { padding: 20px; }
.page-title { margin-bottom: 24px; }
.berita-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 24px; }
.berita-card { background: #fff; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); overflow: hidden; }
.card-img { width: 100%; height: 200px; object-fit: cover; }
.card-body { padding: 20px; }
.card-title { font-size: 1.2rem; font-weight: 600; margin: 0 0 8px; }
.card-date { font-size: 0.875rem; color: #6b7280; margin-bottom: 12px; }
.card-text { color: #4b5563; line-height: 1.6; }
.btn-read-more { display: inline-block; margin-top: 16px; color: #3b82f6; text-decoration: none; font-weight: 600; }
</style>
@endpush