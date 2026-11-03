@extends('admin.dashboard')

@section('content')
<div class="card card-body shadow border-0 my-4">
    <h4 class="mb-4">Edit Data CV</h4>
    <form action="{{ route('cv.update', $cv->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $cv->nama_lengkap }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Profesi / Title</label>
                <input type="text" name="profesi_title" value="{{ $cv->profesi_title }}" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Ringkasan Profil (Tentang Saya)</label>
                <textarea name="tentang_saya" class="form-control" rows="3" required>{{ $cv->tentang_saya }}</textarea>
            </div>
            <div class="col-md-4 mb-3">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="ttl" value="{{ $cv->ttl }}" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" value="{{ $cv->jenis_kelamin }}" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Agama</label>
                <input type="text" name="agama" value="{{ $cv->agama }}" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" value="{{ $cv->kewarganegaraan }}" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Email</label>
                <input type="email" name="email" value="{{ $cv->email }}" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Status</label>
                <input type="text" name="status" value="{{ $cv->status }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Nomor Telephone</label>
                <input type="text" name="telepon" value="{{ $cv->telepon }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Website</label>
                <input type="text" name="website" value="{{ $cv->website }}" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" value="{{ $cv->alamat }}" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Keahlian (Pisahkan dengan koma)</label>
                <input type="text" name="keahlian" value="{{ $cv->keahlian }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Pendidikan</label>
                <textarea name="pendidikan" class="form-control" rows="4" required>{{ $cv->pendidikan }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label>Pengalaman</label>
                <textarea name="pengalaman" class="form-control" rows="4" required>{{ $cv->pengalaman }}</textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label>Hobi (Pisahkan dengan koma)</label>
                <input type="text" name="hobi" value="{{ $cv->hobi }}" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Ganti Foto Profil (Kosongkan jika tidak diubah)</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>
            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary me-2">Update CV</button>
                <a href="{{ route('cv.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
