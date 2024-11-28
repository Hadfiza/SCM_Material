@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Edit Kontrak</h1>
    <hr>

    <form action="{{ route('admin.kontrak.update', $kontrak->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ old('deskripsi', $kontrak->deskripsi) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $kontrak->tanggal_mulai) }}" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
            <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $kontrak->tanggal_selesai) }}" required>
        </div>

        <div class="mb-3">
            <label for="bukti_kontrak" class="form-label">Bukti Kontrak (PDF/Doc/Docx)</label>
            <input type="file" class="form-control" id="bukti_kontrak" name="bukti_kontrak">
            @if($kontrak->bukti_kontrak)
                <p>File sebelumnya: <a href="{{ asset('storage/' . $kontrak->bukti_kontrak) }}" target="_blank">Lihat Bukti</a></p>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Kontrak</button>
    </form>
</div>
@endsection
