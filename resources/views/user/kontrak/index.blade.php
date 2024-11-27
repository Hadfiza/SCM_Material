@extends('layouts.layout')

@section('content')
<div class="container">
    <h1>Daftar Kontrak</h1>

    <table class="table">
        <thead>
            <tr>
                <th>Deskripsi</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Bukti Kontrak</th>
                @if(Auth::user()->usertype === 'admin') 
                    <th>Aksi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($kontrak as $kontraks)
                <tr>
                    <td>{{ $kontraks->deskripsi }}</td>
                    <td>{{ $kontraks->tanggal_mulai }}</td>
                    <td>{{ $kontraks->tanggal_selesai }}</td>
                    <td><a href="{{ asset('storage/' . $kontraks->bukti_kontrak) }}" target="_blank">Lihat Bukti</a></td>
                    @if(Auth::user()->usertype === 'admin') 
                        <td>
                            <a href="{{ route('admin.kontrak.edit', $kontraks->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.kontrak.destroy', $kontraks->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
