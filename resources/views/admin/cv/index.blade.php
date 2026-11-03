@extends('admin.dashboard')

@section('content')
<div class="d-flex justify-content-between align-items-center my-3">
    <h4>Daftar Pratinjau CV</h4>
    <a href="{{ route('cv.create') }}" class="btn btn-primary">+ Buat CV Baru</a>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@forelse($cvs as $cv)
<div class="card shadow-lg border-0 p-0 overflow-hidden mx-auto mb-5" style="max-width: 800px; background: #fff; color: #333;">
    <!-- Tombol Aksi di Atas Kartu CV -->
    <div class="bg-light p-2 text-end border-bottom">
        <a href="{{ route('cv.edit', $cv->id) }}" class="btn btn-sm btn-warning">Edit CV</a>
        <form action="{{ route('cv.destroy', $cv->id) }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus CV ini?')">Hapus</button>
        </form>
    </div>

    <div class="row g-0">
        <!-- KOLOM KIRI (NAVY) -->
        <div class="col-md-5 p-4 text-white" style="background-color: #233e49;">
            <div class="text-center mb-4">
                <img src="{{ $cv->foto ? asset('storage/' . $cv->foto) : 'https://via.placeholder.com/150' }}"
                     class="rounded-circle img-thumbnail mb-3" style="width: 140px; height: 140px; object-fit: cover; border: 4px solid #fff;">
                <h3 class="fw-bold mb-1 text-white">{{ $cv->nama_lengkap }}</h3>
                <p class="fst-italic opacity-75">{{ $cv->profesi_title }}</p>
            </div>

            <p class="small mb-4 text-white-50" style="text-align: justify;">{{ $cv->tentang_saya }}</p>

            <h5 class="fw-bold border-bottom pb-1 mb-3 text-uppercase">Keahlian</h5>
            <ul class="ps-3 mb-4 small">
                @foreach(explode(',', $cv->keahlian) as $skill)
                    <li>{{ trim($skill) }}</li>
                @endforeach
            </ul>

            <h5 class="fw-bold border-bottom pb-1 mb-3 text-uppercase">Kontak</h5>
            <div class="small">
                <p class="mb-2"><i class="fas fa-phone me-2"></i> {{ $cv->telepon }}</p>
                <p class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> {{ $cv->alamat }}</p>
                @if($cv->website)<p class="mb-0"><i class="fas fa-globe me-2"></i> {{ $cv->website }}</p>@endif
            </div>
        </div>

        <!-- KOLOM KANAN (PUTIH) -->
        <div class="col-md-7 p-4">
            <h5 class="fw-bold text-uppercase border-bottom border-2 border-dark pb-1 mb-3">Data Pribadi</h5>
            <table class="table table-borderless table-sm small mb-4">
                <tr><td width="35%">Tempat, Tgl Lahir</td><td>: {{ $cv->ttl }}</td></tr>
                <tr><td>Alamat</td><td>: {{ $cv->alamat }}</td></tr>
                <tr><td>Nomor Telephone</td><td>: {{ $cv->telepon }}</td></tr>
                <tr><td>Jenis Kelamin</td><td>: {{ $cv->jenis_kelamin }}</td></tr>
                <tr><td>Agama</td><td>: {{ $cv->agama }}</td></tr>
                <tr><td>Kewarganegaraan</td><td>: {{ $cv->kewarganegaraan }}</td></tr>
                <tr><td>Email</td><td>: {{ $cv->email }}</td></tr>
                <tr><td>Status</td><td>: {{ $cv->status }}</td></tr>
            </table>

            <h5 class="fw-bold text-uppercase border-bottom border-2 border-dark pb-1 mb-3">Pendidikan</h5>
            <div class="small mb-4" style="white-space: pre-line;">{{ $cv->pendidikan }}</div>

            <h5 class="fw-bold text-uppercase border-bottom border-2 border-dark pb-1 mb-3">Pengalaman</h5>
            <div class="small mb-4" style="white-space: pre-line;">{{ $cv->pengalaman }}</div>

            <h5 class="fw-bold text-uppercase border-bottom border-2 border-dark pb-1 mb-3">Hobi</h5>
            <ul class="ps-3 small mb-0">
                @foreach(explode(',', $cv->hobi) as $hobi)
                    <li>{{ trim($hobi) }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@empty
<div class="alert alert-info">Belum ada data CV. Klik tombol di atas untuk membuat CV baru.</div>
@endforelse
@endsection
