@extends('layouts.layout')

@section('title', 'Daftar Pemasok')

@section('content')
<h1>Daftar Pemasok</h1>

<a href="{{ route('pemasok.create') }}" class="btn btn-primary mb-3">Tambah Pemasok</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama Pemasok</th>
            <th>Alamat</th>
            <th>Kontak</th>
            <th>Kontrak</th>
            <th>Rating</th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($pemasok as $pemasok)
            <tr>
                <td>{{ $pemasok->nama_pemasok }}</td>
                <td>{{ $pemasok->alamat }}</td>
                <td>{{ $pemasok->kontak }}</td>
                <td>{{ $pemasok->kontrak ? $pemasok->kontrak->deskripsi : '-' }}</td>
                <td>{{ $pemasok->rating_pemasok }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
