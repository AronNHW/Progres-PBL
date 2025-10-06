@extends('layouts.admin')

@section('title', 'Kelola Aspirasi')

@section('content')
    <h1>Kelola Aspirasi</h1>

    <section class="data-table-container" style="margin-top:12px">
        <div style="margin-bottom:12px;">
            <a href="{{ route('admin.aspirasi.printPdf') }}" class="btn-print" target="_blank">Cetak Semua Aspirasi (PDF)</a>
        </div>

        @if(session('ok'))
            <div style="padding:10px 12px;border-radius:8px;background:#ecfdf5;color:#065f46;margin-bottom:12px;">
                {{ session('ok') }}
            </div>
        @endif

        <table class="data-table">
            <thead>
                <tr>
                    <th>NAMA</th>
                    <th>EMAIL</th>
                    <th>PESAN</th>
                    <th>WAKTU</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @forelse($aspirasis as $aspirasi)
                    <tr>
                        <td>{{ strtoupper($aspirasi->nama) }}</td>
                        <td>{{ $aspirasi->email }}</td>
                        <td style="max-width:320px">{{ Str::limit($aspirasi->pesan, 60) }}</td>
                        <td>{{ $aspirasi->created_at->format('d M Y H:i') }}</td>
                        <td>
                            <a class="btn-blue" href="{{ route('admin.aspirasi.show', $aspirasi) }}">Lihat</a>
                            <form action="{{ route('admin.aspirasi.destroy', $aspirasi) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus aspirasi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-red">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align:center;color:#888;">Belum ada aspirasi</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div style="margin-top:12px;">
            {{ $aspirasis->links() }}
        </div>
    </section>
@endsection

@push('styles')
<style>
.btn-print{background:#22c55e;color:#fff;padding:8px 14px;border-radius:8px;font-weight:600;text-decoration:none}
.btn-blue{background:#3b82f6;color:#fff;padding:6px 10px;border-radius:6px;text-decoration:none;margin-right:6px;font-weight:600}
.btn-red{background:#ef4444;color:#fff;padding:6px 10px;border-radius:6px;border:0;font-weight:600;cursor:pointer}
.data-table{width:100%;border-collapse:collapse}
.data-table th,.data-table td{border:1px solid #e5e7eb;padding:8px 12px}
.data-table th{background:#f9fafb}
</style>
@endpush
