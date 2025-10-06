@extends('layouts.user')

@section('title', 'Berita')

@section('content')
    <div class="container">
        <h1 class="page-title">Berita Terbaru</h1>

        <div class="berita-grid">
            @forelse ($beritas as $berita)
                <div class="berita-card">
                    <img src="{{ asset('storage/' . $berita->foto_berita) }}" alt="Foto Berita" class="card-img">
                    <div class="card-body">
                        <h2 class="card-title">{{ $berita->judul_berita }}</h2>
                        <p class="card-date">{{ $berita->created_at->format('d F Y') }}</p>
                        <p class="card-text">{{ Str::limit($berita->deskripsi, 100) }}</p>
                        <a href="{{ route('user.berita.show', $berita->id) }}" class="btn-read-more">Baca Selengkapnya</a>
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
.page-title { 
    text-align: center;
    font-size: 2.5rem;
    font-weight: 800;
    color: #2563eb;
    margin-bottom: 40px;
}
.berita-grid { 
    display: grid; 
    grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); 
    gap: 32px; 
}
.berita-card { 
    background: #fff; 
    border-radius: 16px; 
    box-shadow: 0 8px 16px rgba(0,0,0,0.05); 
    overflow: hidden;
    transition: transform 0.3s, box-shadow 0.3s;
}
.berita-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(0,0,0,0.1);
}
.card-img { 
    width: 100%; 
    height: 220px; 
    object-fit: cover; 
}
.card-body { 
    padding: 24px; 
}
.card-title { 
    font-size: 1.4rem; 
    font-weight: 700; 
    margin: 0 0 12px; 
    color: #333;
}
.card-date { 
    font-size: 0.9rem; 
    color: #6b7280; 
    margin-bottom: 16px; 
}
.card-text { 
    color: #4b5563; 
    line-height: 1.7; 
    margin-bottom: 20px;
}
.btn-read-more { 
    display: inline-block; 
    background-color: #2563eb;
    color: #fff;
    padding: 10px 20px;
    border-radius: 8px;
    text-decoration: none; 
    font-weight: 600; 
    transition: background-color 0.3s;
}
.btn-read-more:hover {
    background-color: #1d4ed8;
}
</style>
@endpush