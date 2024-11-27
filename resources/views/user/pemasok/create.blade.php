@extends('layouts.layout')

@section('title', 'Tambah Pemasok')

@section('content')
<h1>Tambah Pemasok</h1>
<form action="{{ route('pemasok.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nama_pemasok" class="form-label">Nama Pemasok</label>
        <input type="text" name="nama_pemasok" id="nama_pemasok" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea name="alamat" id="alamat" class="form-control" required></textarea>
    </div>
    <div class="mb-3">
        <label for="kontak" class="form-label">Kontak</label>
        <input type="text" name="kontak" id="kontak" class="form-control" required>
    </div>
    <div class="mb-3">
        <label for="kontrak_id" class="form-label">Kontrak</label>
        <select name="kontrak_id" id="kontrak_id" class="form-control">
            <option value="">Pilih Kontrak</option>
            @foreach ($kontrak as $kontrak)
                <option value="{{ $kontrak->id }}">{{ $kontrak->deskripsi }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
