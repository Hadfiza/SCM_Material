<!-- resources/views/profile/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Profil Pengguna')

@section('content')
    <div class="container mt-4">
        <h1>Edit Profil</h1>

        {{-- Pesan error --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Tampilkan Foto Profil Pengguna --}}
        <div class="mb-3 text-center">
            @if ($user->photo)
                <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="img-thumbnail mb-3" width="150">
            @else
                <i class="fas fa-user-circle fa-5x mb-3"></i>  {{-- Ikon default jika tidak ada foto --}}
            @endif
        </div>

        {{-- Form Edit Profil --}}
        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  <!-- Gunakan PUT untuk update -->

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
            </div>
            <div class="mb-3">
                <label for="photo" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" id="photo" name="photo" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </form>
    </div>
@endsection
