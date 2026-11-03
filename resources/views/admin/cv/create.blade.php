@extends('admin.dashboard')

@section('content')
<div class="card card-body shadow border-0 my-4">
    <h4 class="mb-4">Buat Data CV</h4>
    <form action="{{ route('cv.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Profesi / Title (misal: Lulusan Baru)</label>
                <input type="text" name="profesi_title" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Ringkasan Profil (Tentang Saya)</label>
                <textarea name="tentang_saya" class="form-control" rows="3" required></textarea>
            </div>
            <div class="col-md-4 mb-3">
                <label>Tempat, Tanggal Lahir</label>
                <input type="text" name="ttl" class="form-control" placeholder="Brocelle, 25 Juli 2000" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Jenis Kelamin</label>
                <input type="text" name="jenis_kelamin" class="form-control" placeholder="Laki-laki" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Agama</label>
                <input type="text" name="agama" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Kewarganegaraan</label>
                <input type="text" name="kewarganegaraan" class="form-control" value="Indonesia" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <div class="col-md-4 mb-3">
                <label>Status</label>
                <input type="text" name="status" class="form-control" placeholder="Belum Menikah" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Nomor Telephone</label>
                <input type="text" name="telepon" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Website</label>
                <input type="text" name="website" class="form-control">
            </div>
            <div class="col-md-12 mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required>
            </div>
            <div class="col-md-12 mb-3">
                <label>Keahlian (Pisahkan dengan koma)</label>
                <input type="text" name="keahlian" class="form-control" placeholder="Kepemimpinan, Kolaborasi, Manajemen Waktu" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Pendidikan (Bisa gunakan Enter/Baris Baru)</label>
                <textarea name="pendidikan" class="form-control" rows="4" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label>Pengalaman</label>
                <textarea name="pengalaman" class="form-control" rows="4" required></textarea>
            </div>
            <div class="col-md-6 mb-3">
                <label>Hobi (Pisahkan dengan koma)</label>
                <input type="text" name="hobi" class="form-control" placeholder="Baca Buku, Travelling, Menyanyi" required>
            </div>
            <div class="col-md-6 mb-3">
                <label>Foto Profil</label>
                <input type="file" name="foto" class="form-control" accept="image/*">
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Simpan CV</button>
                <a href="{{ route('cv.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </div>
    </form>
</div>
@endsection
