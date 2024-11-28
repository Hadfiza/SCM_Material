@extends('layouts.app')

@section('content')
<html>
<head>
    <title>
        Daftar Pengiriman
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
<main class="container mx-auto mt-8">
    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold">
                Daftar Pengiriman
            </h2>
            <p class="text-lg font-bold">
                Jumlah Pengiriman: <span class="text-blue-600">{{ $totalPengiriman }}</span>
            </p>
        </div>
        <div class="overflow-x-auto">
            @if($pengiriman->isEmpty())
                <p>Tidak ada pengiriman yang tersedia.</p>
            @else
                <table class="min-w-full bg-white">
                    <thead>
                    <tr>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            ID Pengiriman
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Material ID
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Tanggal Kirim
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Tanggal Kedatangan
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Order ID
                        </th>
                        <th class="py-2 px-4 border-b-2 border-gray-200 bg-gray-100 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">
                            Status Pengiriman
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengiriman as $item)
                        <tr>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $item->id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $item->material_id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $item->tanggal_kirim }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $item->tanggal_selesai }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $item->order_id }}</td>
                            <td class="py-2 px-4 border-b border-gray-200">{{ $item->status_pengiriman }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</main>
</body>
</html>
@endsection