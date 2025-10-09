@extends('layouts.pengurus')

@section('title', 'Kelola Anggota Hima-TI')

@push('styles')
<style>
    /* Using similar styles from other pages for consistency */
    #anggota-aktif-page h1 { font-size: 1.875rem; font-weight: 700; color: #1F2937; margin-bottom: 1.5rem; }
    .table-container { background-color: #fff; border-radius: 0.75rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06); overflow: hidden; }
    .data-table { width: 100%; border-collapse: collapse; }
    .data-table th, .data-table td { padding: 1rem 1.5rem; text-align: left; border-bottom: 1px solid #E5E7EB; }
    .data-table thead th { background-color: #F3F4F6; font-weight: 600; color: #6B7280; text-transform: uppercase; font-size: 0.75rem; letter-spacing: 0.05em; }
    .data-table tbody tr:hover { background-color: #F9FAFB; }
</style>
@endpush

@section('content')
<div id="anggota-aktif-page">
    <h1>
        @if(isset($divisi))
            Anggota Aktif Divisi {{ $divisi->nama_divisi }}
        @else
            Anggota Aktif Hima-TI
        @endif
    </h1>

    <section class="table-container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>NIM</th>
                    <th>Nomor HP</th>
                    <th>Divisi</th>
                    <th>Bergabung Sejak</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->nim ?? 'N/A' }}</td>
                        <td>{{ $member->hp ?? 'N/A' }}</td>
                        <td>{{ $member->divisi->nama_divisi ?? 'N/A' }}</td>
                        <td>{{ $member->updated_at->translatedFormat('d F Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center; padding: 3rem;">Belum ada anggota aktif.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </section>

    <div style="margin-top: 1.5rem;">
        {{ $members->links() }}
    </div>
</div>
@endsection
