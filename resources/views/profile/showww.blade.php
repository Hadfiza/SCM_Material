{{-- {{-- @extends('layouts.app')

@section('content')
<h1>Profil Pengguna</h1>
<p>Nama: {{ $user->name }}</p>
<p>Email: {{ $user->email }}</p>
<img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" width="150" />
<a href="{{ route('profile.edit') }}">Edit Profil</a>
@endsection --}}


@extends('layouts.app')

@section('title', 'Profil Pengguna')

@section('content')
    <div class="container mt-4">
        <h1>Profil Pengguna</h1>

        {{-- Pesan sukses
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif --}}

        {{-- Tampilkan Informasi Profil --}}
        <div class="card">
            <div class="card-body text-center">
                @if ($user->photo)
                    <img src="{{ asset('storage/' . $user->photo) }}" alt="Foto Profil" class="img-thumbnail mb-3" width="150">
                @else
                    <img src="{{ asset('images/default-user.png') }}" alt="Foto Profil Default" class="img-thumbnail mb-3" width="150">
                @endif
                <h5 class="card-title">Nama: {{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>

        {{-- <div class="card">
            <div class="card-body">
                <h5 class="card-title">Nama: {{ $user->name }}</h5>
                <p class="card-text">Email: {{ $user->email }}</p>
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profil</a>
            </div>
        </div> --}}
    </div>
@endsection
 --}}
