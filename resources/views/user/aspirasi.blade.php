@extends('layouts.user')

@section('title','Kotak Aspirasi')

@section('content')
    <div class="form-container">
        <div class="form-header">
            <h1>Kotak Aspirasi</h1>
            <p>Sampaikan aspirasi, kritik, dan saran Anda untuk HMTI yang lebih baik.</p>
        </div>
        <form action="#" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Masukkan email Anda">
            </div>
            <div class="form-group">
                <label for="perihal">Perihal</label>
                <input type="text" id="perihal" name="perihal" placeholder="Subjek atau topik aspirasi Anda">
            </div>
            <div class="form-group">
                <label for="aspirasi">Aspirasi Anda</label>
                <textarea id="aspirasi" name="aspirasi" placeholder="Tuliskan aspirasi, kritik, atau saran Anda di sini..."></textarea>
            </div>
            <button type="submit" class="submit-btn">Kirim Aspirasi</button>
        </form>
    </div>
@endsection
