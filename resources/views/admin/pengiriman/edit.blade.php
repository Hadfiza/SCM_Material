@extends('admin.dashboard')

@section('title', 'Edit Pengiriman')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1>Edit Pengiriman</h1>
                <hr>

                <form action="{{ route('admin.pengiriman.update', $pengiriman->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="material_id" class="form-label">Material ID</label>
                        <input type="text" class="form-control" id="material_id" name="material_id" value="{{ $pengiriman->material_id }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kirim" class="form-label">Tanggal Kirim</label>
                        <input type="date" class="form-control" id="tanggal_kirim" name="tanggal_kirim" value="{{ $pengiriman->tanggal_kirim }}">
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" value="{{ $pengiriman->tanggal_selesai }}">
                    </div>


                    <div class="mb-3">
                        <label for="status_pengiriman" class="form-label">Status Pengiriman</label>
                        <select class="form-select" id="status_pengiriman" name="status_pengiriman">
                            <option value="dikirim" {{ $pengiriman->status_pengiriman == 'dikirim' ? 'selected' : '' }}>DiKirim</option>
                            <option value="diterima" {{ $pengiriman->status_pengiriman == 'diterima' ? 'selected' : '' }}>Diterima</option>
                            <option value="batal" {{ $pengiriman->status_pengiriman == 'batal' ? 'selected' : '' }}>Batal</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="order_id" class="form-label">Order ID</label>
                        <input type="text" class="form-control" id="order_id" name="order_id" value="{{ $pengiriman->order_id }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Update Pengiriman</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
