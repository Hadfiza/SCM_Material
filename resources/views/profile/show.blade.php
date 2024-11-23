@extends('layouts.app')

@section('title', 'Material')
@section('custom-css')
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection
@section('navbar', 'Profil')
@section('navbar-item', 'Informasi Profil')

@section('content')
    <!-- Content -->
    {{-- <div>
      <div class="card shadow bg-body-tertiary rounded">
        <div class="navbar-content card-header d-flex flex-row ps-3 flex-wrap flex-md-nowrap bg-white">
          <a href="#" class="text-dark px-2 py-2">All Materials</a>
          <a href="#" class="text-dark px-2 py-2">Contract</a>
        </div>
        <div class="content card-body"> --}}
        <!-- ISI CONTENT -->

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


        <!-- =========================== -->
        </div>

      </div>
    </div>
@endsection
  
