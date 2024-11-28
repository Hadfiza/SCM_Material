@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Tambah Kontrak Baru</h1>

    <!-- Pastikan form menggunakan enctype="multipart/form-data" untuk mengirim file -->
    <form action="{{ route('admin.kontrak.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" required></textarea>
        </div>

        <div class="form-group">
            <label for="tanggal_mulai">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tanggal_selesai">Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="bukti_kontrak">Bukti Kontrak</label>
            <input type="file" name="bukti_kontrak" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
